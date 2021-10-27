<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simple_CRUD extends CI_Model {

		//Query Create
		function insertData($table,$data)
		{
		$this->db->insert($table,$data);
		}


		function insertData_get_id($table,$data)
		{
			$query = $this->db->insert($table,$data);

			$insert_id = $this->db->insert_id();

			return  $insert_id;
		}

		//Query Read

		public function getAllData($table)
		{
			return $this->db->get($table);

		}

		public function getAllDataSort($table, $id_table)
		{
			$this->db->order_by($id_table, 'DESC');
			return $this->db->get($table);

		}

		//Query Update

		function get_detail1($table,$id_table,$id) {
			$this->db->where($id_table,$id);
			$query = $this->db->get($table);
			$isi=$query->row_array();
			return $isi;
		}

		function get_detail2($table,$id_table,$id) {
			$this->db->where($id_table,$id);
			$query = $this->db->get($table);
			return $query;
		}




		function updateData1($table,$data,$field,$id)
		{
		$this->db->where($field,$id);
		$this->db->update($table,$data);
		}

		//Query Delete
		function deleteData($table,$data)
		{
		$this->db->delete($table, $data);
		}

		function deleteAllData($table) {
			$query = $this->db->query('TRUNCATE table '.$table.'');
		}

}
