<?php

	class UsuarioModel extends CI_Model {
		public function listaUsuarios() {
			$this->db->select('ID_usuario, nome, avatar');
			$this->db->from('usuario');

			$query = $this->db->get();

			if($query -> num_rows()) {
				$r = $query->result();
		    	return $r;
		   	} else {
		    	return false;
		    }
		}

		public function getUsuarioById($idUsuario) {
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where('ID_usuario', $idUsuario);

			$query = $this->db->get();

			if($query -> num_rows() == 1) {
				$r = $query->result();
		    	return $r[0];
		   	} else {
		    	return false;
		    }
		}

		public function listaUsuariosPorResponsavel($idResponsavel) {
			$this->db->select('ID_usuario');
			$this->db->from('usuario_responsavel');
			$this->db->where('ID_responsavel', (int)$idResponsavel);

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$r = $query->result();
				$usuarios = Array();
				foreach ($r as $usuario => $value) {
					$usuarios[] = $this->getUsuarioById($value->ID_usuario);
				}
				return $usuarios;
			} else {
				return Array();
			}
		}
	}

?>