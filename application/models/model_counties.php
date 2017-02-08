<?php
class Model_counties extends CI_Model{
	
	function _construct(){
		parent::_construct();
	}


	function getCountyInfo(){
		$query = $this->db->query('SELECT * FROM counties');

		if($query->num_rows() > 0){
			return $query->result();			
		}

		else{
			return NULL;
		}
	}
}
?>