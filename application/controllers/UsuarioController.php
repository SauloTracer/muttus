<?php 

	class UsuarioController extends CI_Controller {
		
		public function index() {
			if($sessionData = $this->session->userdata('logged_in')) {
				if($sessionData['tipo'] == 'usuario') {
					$this->load->model('UsuarioModel');
					$usuario = $this->UsuarioModel->getUsuarioById($sessionData['id']);
					$data = array(
						'usuario' => $usuario
					);
					$this->load->view('usuario', $data);
				}
			} else {
				redirect("LoginController/loginUsuario");
			}
		}

	}

?>