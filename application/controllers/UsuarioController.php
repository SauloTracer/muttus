<?php 
	require_once("CategoriaController.php");

	class UsuarioController extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			if($sessionData = $this->session->userdata('logged_in')) {
				if($sessionData['tipo'] == 'usuario') {
					$this->load->model('UsuarioModel');
					$userId = $sessionData['id'];
					$usuario = $this->UsuarioModel->getUsuarioById($userId);
					$this->load->library('Categoria');
					$categorias = $this->categoria->categoryTree($userId);
					$data = array(
						'usuario' => $usuario,
						'categorias' => $categorias
					);
					$this->load->view('usuario', $data);
				}
			} else {
				redirect("LoginController/loginUsuario");
			}
		}

	}

?>