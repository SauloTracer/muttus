<?php

	class AlunoModel extends CI_Model {
		public function listaAlunos() {
			$this->db->select('ID_aluno, nome, avatar');
			$this->db->from('aluno');

			$query = $this->db->get();

			if($query -> num_rows()) {
				$r = $query->result();
		    	return $r;
		   	} else {
		    	return false;
		    }
		}

		public function getAlunoById($idAluno) {
			$this->db->select('*');
			$this->db->from('aluno');
			$this->db->where('ID_aluno', $idAluno);

			$query = $this->db->get();

			if($query -> num_rows() == 1) {
				$r = $query->result();
		    	return $r[0];
		   	} else {
		    	return false;
		    }
		}
	}

?>