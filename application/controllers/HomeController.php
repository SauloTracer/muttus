<?php 

	class HomeController extends CI_Controller {
		public function index() {

			$data['baseurl'] = $this->config->base_url();

			if($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$tipo = $session_data['tipo'];
				if ($tipo == 'usuario') {
					redirect('UsuarioController');
				} else {
					redirect('ResponsavelController');
				}				
			} else {
				//If no session, redirect to login page
				$data['logged'] = false;
				$this->load->view('home', $data);
			}
			
		}
	}

?>