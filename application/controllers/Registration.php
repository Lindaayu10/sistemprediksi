<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
	}

	public function index()
	{
		$this->load->view('auth/registration');
	}

	public function store()
	{


		if ($this->input->post('password1') == $this->input->post('password2')) {

			$data = [
				"nama" => $this->input->post('nama', true),
				"username" => $this->input->post('username', true),
				"email" => $this->input->post('email', true),
				"password" => md5($this->input->post('password1', true)),
				"level" => "guru"
			];

			$this->Model_login->register($data);
			redirect('auth');
		} else {
			redirect('registration');
		}
	}
}
