<?php
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
	}

	function index()
	{
		$data['user'] = $this->db->get('user')->result();
		$this->load->view('auth/login', $data);
	}

	function authentication()
	{

		$username = $this->input->POST('username', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$validate = $this->Model_login->validate($username, $password);

		if ($validate->num_rows() > 0) {
			$data  = $validate->row_array();

			$username  = $data['username'];
			$password = $data['password'];
			$level = $data['level'];
			$sesdata = array(
				'id'				=> $data['id_user'],
				'username'  => $username,
				'password'  => $password,
				'level'     => $level,
				'logged_in' => TRUE,
				'authenticated' => TRUE
			);

			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === 'admin') {
				redirect('admin/dashboard');

				// access login for guru
			} elseif ($level === 'guru') {
				redirect('guru/dashboard');
			} else {
				echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
				redirect('login');
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
