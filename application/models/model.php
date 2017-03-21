<?php

class Model extends CI_Model {

	function login($where = ''){
		return $this->db->query("select * from user $where;");
	}

	function ambillevel(){
		return $this->db->query("select level from user");
	}

	function getPetunjuk(){
		return $this->db->query('select * from data where no_data = 2')->result_array();
	}

	function getTentang(){
		return $this->db->query('select * from data where no_data = 3')->result_array();
	}

	function getWewenang(){
		return $this->db->query('select * from data where no_data = 4')->result_array();
	}

	function getTitle(){
		return $this->db->query('select * from data where no_data = 1')->result_array();
	}

}

?>