<?php

class CategoriaModel extends CI_Model {

	public function newCategory ($imagem, $som, $texto, $video, $libras, $emoticon, $usuarioId) {
		$array = array(
			'imagem' => $imagem,
			'som' => $som,
			'texto' => $texto,
			'video' => $video,
			'libras' => $libras,
			'emoticon' => $emoticon,
			'usuario' => $usuarioId
		);

		$this->db->insert('categoria', $array);
	}

	public function getCategories($usuarioId) {
		$this->db->from('categoria');
		$this->db->where('usuario', $usuarioId);
		$query = $this->db->get(); 
		return $query->result();
	}

	public function getCategoryById($id) {
		$this->db->from('categoria');
		$this->db->where('ID_categoria', $id);
		$query = $this->db->get(); 
		return $query->result();
	}

	public function getCategoryTree($userId = null, $mae = null) {
		$this->db->from('categoria');
		$this->db->where('mae', $mae);
		if(!empty($userId)){
			$this->db->where('usuario', $userId);
		}
		$query = $this->db->get();
		return $query->result();
	}
		
}