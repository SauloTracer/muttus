<?php

class CategoriaModel extends CI_Model {

	public function newCategory ($imagem, $som, $texto, $video, $libras, $emoticon, $alunoId) {
		$array = array(
			'imagem' => $imagem,
			'som' => $som,
			'texto' => $texto,
			'video' => $video,
			'libras' => $libras,
			'emoticon' => $emoticon,
			'aluno' => $alunoId
		);

		$this->db->insert('categoria', $array);
	}

	public function getCategories($alunoId) {
		$this->db->from('categoria');
		$this->db->where('aluno', $alunoId);
		$query = $this->db->get(); 
		return $query->result();
	}

	public function getCategoryById($id) {
		$this->db->from('categoria');
		$this->db->where('ID_categoria', $id);
		$query = $this->db->get(); 
		return $query->result();
	}

	public function getCategoryByMae($mae = null) {
		$query = $this->db->from('categoria')->where('mae', $mae)->get(); 
		return $query->result();
	}
		
}