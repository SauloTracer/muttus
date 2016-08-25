<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria {

	protected $CI;
	private $CategoriaModel;

	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->model('CategoriaModel');
	}

	public function categoryTree($userId = null, $categoryId = null) {

		$lista = $this->CI->CategoriaModel->getCategoryTree($userId, $categoryId);
		$tree = array();

		if(count($lista) == 0) return $tree;
		
		foreach ($lista as $categoria) {
			$tree[] = array("id" => $categoria->ID_categoria, 
				"categoria" => $categoria,
				"SubCategoria" => $this->categoryTree($userId, $categoria->ID_categoria)
			);
		}

		return $tree;
	}
	
}

?>