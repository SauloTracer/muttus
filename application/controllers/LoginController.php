<?php 

	class LoginController extends CI_Controller {
		public function index() {
			$this->load->view('loginResponsavel');
		}

		public function loginUsuario() {
			$this->load->model('UsuarioModel');

			$usuarios = $this->UsuarioModel->listaUsuarios();
			$data = array('usuarios' => $usuarios);

			$this->load->view('loginUsuario', $data);
		}

		public function logarUsuario($idUsuario) {
			$this->load->model('UsuarioModel');

			$usuario = $this->UsuarioModel->getUsuarioById($idUsuario);
			if ($usuario) {
				$sess_array = array(
			       'id' => $usuario->ID_usuario,
			       'nome' => $usuario->nome,
			       'avatar' => $usuario->avatar,
			       'tipo' => 'usuario'
			    );

				$this->session->set_userdata('logged_in', $sess_array);
			}

			redirect("UsuarioController/index");
		}

		public function logaResponsavel() {
			redirect("ResponsavelController");
		}

		public function checkLogin() {
			$this->form_validation->set_rules('username', 'Usuário', 'required');
			$this->form_validation->set_rules('password', 'Senha', 'required');

			if(!$this->form_validation->run()) {
				redirect('LoginController/index');
			} 

			$user = $this->verifyUser();
			if($user) {
				$sess_array = array(
			       'id' => $user->ID_responsavel,
			       'username' => $user->username,
			       'avatar' => $user->avatar,
			       'tipo' => 'responsavel'
			    );

				$this->session->set_userdata('logged_in', $sess_array);
				redirect('ResponsavelController');
			} else {
				$this->load->view('loginResponsavel');
			}
		}

		public function verifyUser() {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('ResponsavelModel');

			if ($data = $this->ResponsavelModel->getResponsavelByLogin($user, $pass)) {
				//recupera info do usuario
				return $data;
			} else {
				$this->form_validation->set_message('verifyUser', 'Usuário ou senha incorretos. Revise e tente novamente.');
				return false;
			}
		}

		public function logout() {
		   $this->session->unset_userdata('logged_in');
		   session_destroy();
		   redirect('HomeController', 'index');
		}
	}

?>