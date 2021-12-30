<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', '', TRUE);
		$this->load->model('Model_datasiswa');
		$this->load->model('Model_datatrining');
		$this->load->model('Model_datatesting');
		$this->load->model('Model_hasil');
		$this->load->library('session');
		$this->load->helper('url', 'form');
	}

	function index()
	{
		if ($this->Dashboard_model->logged_id()) {
			$data['siswa'] = $this->Model_datasiswa->count();
			$data['trining'] = $this->Model_datatrining->count();
			$data['testing'] = $this->Model_datatesting->count();
			$data['hasil'] = $this->Model_hasil->count();
			$this->load->view('guru/dashboard', $data);
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
