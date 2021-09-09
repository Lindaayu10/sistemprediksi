<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', '', TRUE);

		$this->load->library('session');
		$this->load->helper('url', 'form');
	}

	function index()
	{

		if ($this->Dashboard_model->logged_id()) {

			$this->load->view('guru/dashboard');
		} else {
			//jika session belum terdaftar, maka redirect ke halaman dashboard
			redirect("login");
		}
	}

	function hasil_prediksi()
	{
		$query = $this->db->query("select sum(price) from projects");
		return $query;
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/index');
	}
}
