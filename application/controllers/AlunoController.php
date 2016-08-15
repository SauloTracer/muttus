<?php 

	class AlunoController extends CI_Controller {
		
		public function index() {
			if($sessionData = $this->session->userdata('logged_in')) {
				if($sessionData['tipo'] == 'aluno') {
					$this->load->model('AlunoModel');
					$aluno = $this->AlunoModel->getAlunoById($sessionData['id']);
					$data = array(
						'aluno' => $aluno
					);
					$this->load->view('aluno', $data);
				}
			} else {
				redirect("LoginController/loginAluno");
			}
		}

	}

?>