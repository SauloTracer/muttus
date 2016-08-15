<?php 

	class ResponsavelController extends CI_Controller {
		
		public function index() {
			if(empty($this->session->userdata('logged_in'))) { redirect('LoginController'); }
			$this->load->view('responsavel');
		}

		public function editar() {
			$id = $this->verificaResponsavel();

			$this->load->model("ResponsavelModel");
			$responsavel = $this->ResponsavelModel->getResponsavelById($id);
			
			$dtNascimento = $responsavel->dt_nascimento;
			if ($dtNascimento != '0000-00-00') {
				$dtNascimento = DateTime::createFromFormat('Y-m-d', $dtNascimento);
				$responsavel->dt_nascimento = $dtNascimento->format('d/m/Y');
			}

			$data = array (
				"responsavel" => $responsavel
			);

			$this->load->view('editarResponsavel', $data);
		}

		public function _editar() {
			$id = $this->verificaResponsavel();

			if ($id) {
				
				$dtNascimento = $_POST['dt_nascimento'];
				if ($dtNascimento) {
					$dtNascimento = DateTime::createFromFormat('d/m/Y', $dtNascimento);
				}

				$data = Array(
					"nome" => $_POST['nome'],
					"endereco" => $_POST['endereco'],
					"sexo"	=> $_POST['sexo'],
					"telefone" => $_POST['telefone'],
					"avatar" => $_POST['file'],
					"email"	=> $_POST['email'],
					"dt_nascimento" => $dtNascimento->format('Y-m-d')
				);
				$this->load->model("ResponsavelModel");
				$this->ResponsavelModel->atualizaResponsavel($id, $data);
			}
			$this->index();

		}

		public function validar() {
			$this->_editar();
		}

		public function validarSenha() {
			$this->_alterarSenha();
		}

		public function alterarSenha() {
			$idResponsavel = $this->verificaResponsavel();
			$this->load->model("ResponsavelModel");
			$responsavel = $this->ResponsavelModel->getResponsavelById($idResponsavel);
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
			$data = Array( "usuarios" => $usuarios);
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

	}

?>