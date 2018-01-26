<?php
class Dashboard_m extends CI_Model{	
	function getUsers(){		
		$this->db->from("user");
		return $this->db->get();
	}	

	function getUser($where, $table){		
		return $this->db->get_where($table,$where);
	}

	function editUser($where, $data, $table){		
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapusUser($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function tambahUser($table, $data)
	{
		$this->db->insert($table,$data);
	}
}