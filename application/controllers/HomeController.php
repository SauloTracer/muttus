<?php 

	class HomeController extends CI_Controller {
		public function index() {

			$data['baseurl'] = $this->config->base_url();

			if($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['avatar'] = $session_data['avatar'];
				$data['logged'] = true;
				$this->load->view('responsavel', $data);
			} else {
				//If no session, redirect to login page
				$data['logged'] = false;
				$this->load->view('home', $data);
			}
			
		}
	}

?>