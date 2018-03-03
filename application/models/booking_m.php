<?php 
 
class Booking_m extends CI_Model{	
	function book($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}