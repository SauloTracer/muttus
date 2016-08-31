<?php 

	class ResponsavelController extends CI_Controller {

		private $usuario = null;
		
		public function __construct() {
			parent::__construct();
			$this->usuario = $this->session->userdata('selected');
		}

		public function index() {
			$id = $this->verificaResponsavel();
			$this->load->model('ResponsavelModel');
			
			$responsavel = $this->ResponsavelModel->getResponsavelById($id);
			if (empty($responsavel->avatar)) $responsavel->avatar = "img/responsavel.png";

			$data = Array(
				'responsavel' => $responsavel
			);
			
			$this->load->view('responsavel', $data);
		}

		public function editar($post = false) {
			$id = $this->verificaResponsavel();

			$this->load->model("ResponsavelModel");
			$responsavel = $this->ResponsavelModel->getResponsavelById($id);
			
			if (empty($responsavel->avatar)) {
				$responsavel->avatar = "img/responsavel.png";
			} else {
				$responsavel->avatar = "uploads/" . $responsavel->avatar;
			}

			$dtNascimento = $responsavel->dt_nascimento;
			if ($dtNascimento != '0000-00-00') {
				$dtNascimento = DateTime::createFromFormat('Y-m-d', $dtNascimento);
				$responsavel->dt_nascimento = $dtNascimento->format('d/m/Y');
			}

			$data = array (
				"responsavel" => $responsavel,
				"post"		  => $post
			);

			$this->load->view('editarResponsavel', $data);
		}

		public function _editar() {
			$id = $this->verificaResponsavel();

			if ($id) {

				$filename = "";
				if($_FILES['userfile']['error'] == 0) {
					$ext = substr($_FILES['userfile']['name'],-4);
					$filename = "foto_$id" . $ext;

					$config['upload_path'] 		= './uploads/';
	                $config['allowed_types'] 	= 'gif|jpg|png';
	                $config['max_size']  		= '1024';
	                $config['file_name'] 		= $filename;
	                $config['overwrite'] 		= true;

	                $this->load->library('upload', $config);
	                if( ! $this->upload->do_upload('userfile')){
	                    $error = array('error' => $this->upload->display_errors());
	                    echo "<pre>";
						print_r($error);
						echo "</pre>";
	                } else {
	                    $data = array('arquivo_data' => $this->upload->data());
	                }
				}

				$dtNascimento = $_POST['dt_nascimento'];
				if (!empty($dtNascimento) && $dtNascimento != '0000-00-00') {
					$dtNascimento = DateTime::createFromFormat('d/m/Y', $dtNascimento);	
					$dtNascimento = $dtNascimento->format('Y-m-d');
				} 

				$data = Array(
					"nome" => $_POST['nome'],
					"endereco" => $_POST['endereco'],
					"sexo"	=> $_POST['sexo'],
					"telefone" => $_POST['telefone'],
					"avatar" => $filename,
					"email"	=> $_POST['email'],
					"dt_nascimento" => $dtNascimento
				);
				$this->load->model("ResponsavelModel");
				$this->ResponsavelModel->atualizaResponsavel($id, $data);
			}
			$this->index();

		}

		public function validar() {
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

          	$rules = array(
		        array(
		                'field' => 'nome',
		                'label' => 'Nome',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'email',
		                'label' => 'Email',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Você deve informar um %s.',
		                ),
		        ),
		        array(
		                'field' => 'endereco',
		                'label' => 'Endereço',
		                'rules' => 'required'
		        )
			);
			$this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->editar($_POST);
            } else {
				$this->_editar();
            }
		}

		public function validarSenha() {
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required', Array("required" => "Mensagem de erro."));
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('myform');
            } else {
				$this->_alterarSenha();
			}
		}

		public function alterarSenha() {
			$idResponsavel = $this->verificaResponsavel();
			$this->load->model("ResponsavelModel");
			$responsavel = $this->ResponsavelModel->getResponsavelById($idResponsavel);
			if (empty($responsavel->avatar)) {
				$responsavel->avatar = "img/responsavel.png";
			} else {
				$responsavel->avatar = "uploads/" . $responsavel->avatar;
			}
			$data = Array ("responsavel" => $responsavel);

			$this->load->view('alteraSenha', $data);
		}

		public function _alterarSenha() {
			$id = $this->verificaResponsavel();

			$data = Array(
				"senha" => $_POST['nova_senha']
			);
			$this->load->model("ResponsavelModel");
			$this->ResponsavelModel->atualizaResponsavel($id, $data);

			$this->index();
		}

		public function listarUsuarios() {
			$idResponsavel = $this->verificaResponsavel();
			$this->load->model('UsuarioModel');
			$usuarios = $this->UsuarioModel->listaUsuariosPorResponsavel($idResponsavel);
			$selected = null;
			if($this->usuario) {
				$selected = $this->UsuarioModel->getUsuarioById($this->usuario);
				$selected = $selected->nome;
			}
			$data = Array( 
					"usuarios" => $usuarios,
					"selected" => $selected
				);
			$this->load->view("usuariosResponsavel", $data);
		}

		public function verificaResponsavel() {
			if(empty($userData = $this->session->userdata('logged_in'))) { redirect('LoginController'); }	//Verifica se existe um usuário logado.
			//var_dump($userData);
			if($userData['tipo'] != 'responsavel') { redirect('LoginController'); } 		  				//Verifica se o usuário logado é do tipo 'responsavel'
			$id = (empty($userData['id'])) ? false : $userData['id']; 		  								//Recupera o id do responsavel
			if (!$id) { redirect('LoginController'); } 														//Verifica se o id esta preenchido
			return $id;
		}

		public function selecionarUsuario($userId = null) {
			$this->session->set_userdata('selected', $userId);
			$this->usuario = $userId;
			$this->listarUsuarios();
		}

	}

?>