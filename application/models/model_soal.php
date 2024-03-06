<?php
class Model_soal extends CI_Model{
 
	function get_soal_random(){
  		$this->db->limit(5,0);
  		$this->db->order_by("RAND ()");
   		return $this->db->get('tbsoal');
	}

	function getdata(){
    	return $this->db->get('tbsoal');
        //return $query->result();
    }
}