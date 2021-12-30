<?php
class Model_login extends CI_Model
{

	function validate($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('user');
		return $result;
	}
	function logged_id()
	{
		return $this->session->userdata('id_user');
	}

	function register($data)
	{
		$this->db->insert('user', $data);
	}
}
