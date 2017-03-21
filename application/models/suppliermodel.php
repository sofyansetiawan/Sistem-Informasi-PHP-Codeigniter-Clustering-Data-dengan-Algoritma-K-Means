<?php

class Suppliermodel extends CI_Model {
	
	function insertdata($tabel, $data){
		return $this->db->insert($tabel,$data);
	}
	
	function deldata($tabel,$where){
		return $this->db->delete($tabel,$where);
	}
	
	function updatedata($tabel,$data,$where){
		return $this->db->update($tabel,$data,$where);
	}

	function selectdata($where = ''){
		return $this->db->query("select * from $where;");
	}
	
}

?>