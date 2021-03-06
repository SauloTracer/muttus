<?php

	class CategoriaController extends CI_controller{

		private $logged;

		public function __construct() {

			parent::__construct();
			$this->logged = false;
		    if($this->session->userdata('logged_in')) {
				$this->logged = true;
			}
				 
			if(!$this->logged) {
				redirect("HomeController/");
			}

			$this->load->model("CategoriaModel");
			$this->load->library('Categoria');
		}

		public function index(){
			$this->menuCategoria();
		}

		public function doUpload() {

			$path = 'C:/wamp/www/honeycomb/uploads';
			$config['upload_path'] = $path;

			$this->load->library('upload', $config);
			
			$this->upload->initialize(
				array("upload_path" => $path)
			);
		
			if ($this->upload->do_multi_upload("up")) {
				//Inserir no banco
				$data = $this->upload->get_multi_upload_data();
				$sessionData = $this->session->userdata("logged_in");

				$texto = $this->input->post('texto');
				$alunoId = $sessionData['id'];
				$imagem = $data[0]['file_name'];

				$imgPath = $data;
				
				echo "<pre>";
				print_r($imgPath);
				echo "</pre>";
				exit();

				$som = $data[1]['file_name'];
				$video = $data[2]['file_name'];
				$libras = $data[3]['file_name'];
				$emoticon = $data[4]['file_name'];
				
				$this->CategoriaModel->newCategory($imagem, $som, $texto, $video, $libras, $emoticon);
				
            } else {
            	$this->upload->display_errors();
            	echo "TESTE<pre>";
				print_r($_FILES);
				echo "</pre>";
            }
        }

		public function exibirCategoria($id){

			$lista = $this->CategoriaModel->getCategoryById($id);
			$categorias = $this->categoria->categoryTree();

			$data = array('texto' => $lista[0]->texto, 
						  'image' =>  $lista[0]->imagem,
						  'som' => $lista[0]->som, 
						  'video' => $lista[0]->video,
						  'categorias' => $categorias);

			$this->load->view('showCategory', $data);

		}

		public function criarCategoria() {
			$this->session->set_userdata("action", "criarCategoria");
			
			$userId = $this->verificaUsuario();
			$categorias = $this->categoria->categoryTree($userId);
			$data = Array("arvore" => $categorias, "selected" => $userId);
			
			$this->load->view('criarCategoria', $data);
			$this->session->set_userdata("action", null);
		}

		public function editarCategoria() {
			$this->session->set_userdata("action", "editarCategoria");

			$userId = $this->verificaUsuario();
			$categorias = $this->categoria->categoryTree($userId);
			$data = Array("arvore" => $categorias, "selected" => $userId);
			
			$this->load->view('editarCategoria', $data);
			$this->session->set_userdata("action", null);
		}

		public function verificaUsuario() {
			if($this->session->userdata("selected")) {
				return $this->session->userdata("selected");
			} else {
				redirect("ResponsavelController/listarUsuarios");
			}
		}

	}