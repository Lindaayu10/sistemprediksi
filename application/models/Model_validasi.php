<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_validasi extends CI_Model {

	function generate_table(){
		$query = $this->db->query('SELECT * from hasil');
		return $query;
	}

	function DeleteAllData($table) {
		$query = $this->db->query('truncate table '.$table.'');
	}

	function updateData($table,$data,$field,$id)
	{
		$this->db->where($field,$id);
		$this->db->update($table,$data);
	}

	function get_dengan_where($table,$field,$where, $id) {
		$query = $this->db->query('SELECT `'.$table.'`.`'.$field.'`  FROM `'.$table.'` WHERE `'.$table.'`.`'.$where.'`='.$id.'');
		return $query;
	}

	//get count data (without condition)
	function get_jml($nama_table){
		$query=$this->db->query('SELECT COUNT(*) as jml FROM '.$nama_table.'');

		return $query->row_array();
	}

	//get count data (with 1 condition)
	function get_jml_where($nama_table, $field, $where){
		$query=$this->db->query("SELECT COUNT(*) as jml FROM ".$nama_table." WHERE ".$nama_table.".".$field." = '".$where."'");

		return $query->row_array();
	}

}
