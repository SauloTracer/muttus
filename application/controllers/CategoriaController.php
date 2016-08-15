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

		public function categoryTree($categoryId = null) {

			$lista = $this->CategoriaModel->getCategoryByMae($categoryId);

			if(count($lista) == 0) {
				return null;
			} 

			$tree = array();

			foreach ($lista as $categoria) {
				$tree[] = array("id" => $categoria->ID_categoria, 
						"categoria" => $categoria,
						"SubCategoria" => $this->categoryTree($categoria->ID_categoria)
				  );
			}

			return $tree;
		}

		public function exibirCategoria($id){

			$lista = $this->CategoriaModel->getCategoryById($id);

			$data = array('texto' => $lista[0]->texto, 
						  'image' =>  $lista[0]->imagem,
						  'som' => $lista[0]->som, 
						  'video' => $lista[0]->video);

			$this->load->view('showCategory', $data);

		}

		public function menuCategoria() {
			
			$categorias = $this->categoryTree();
			$data = array('baseurl' => $this->config->base_url(),
						  'categorias' => $categorias,
						   'logged' => $this->logged);
			$this->load->view('categoryTree', $data);

		}

	}