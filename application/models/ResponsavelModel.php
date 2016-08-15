<?php

	class ResponsavelModel extends CI_Model {
		public function listaAlunos() {
			
		}

		public function getResponsavelByLogin($username, $password) {
			$this->db->select('*');
			$this->db->from('responsavel');
			$this->db->where('username', $username);
			$this->db->where('senha', $password);

			$query = $this->db->get();

			if($query -> num_rows() == 1) {
				$r = $query->result();
		    	return $r[0];
		   	} else {
		    	return false;
		    }
		}

		public function getResponsavelById($id) {
			$this->db->select('*');
			$this->db->from('responsavel');
			$this->db->where('ID_responsavel', $id);

			$query = $this->db->get();

			if($query -> num_rows() == 1) {
				$r = $query->result();
		    	return $r[0];
		   	} else {
		    	return false;
		    }
		}

		public function atualizaResponsavel($id, $data) {
			$this->db->where('ID_responsavel', $id);
			$this->db->update('responsavel', $data);
		}

	}

?>