<?php

	class LoginModel extends CI_Model {
		public function login($user, $pass) {
			$this->db->select('ID_aluno, username, senha, avatar');
			$this->db->from('aluno');
			$this->db->where('username', $user);
			$this->db->where('senha', $pass);

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