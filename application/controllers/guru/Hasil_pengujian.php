<?php

class hasil_pengujian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_hasil');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// echo 'test';
		$data["predikat_asli_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'BAIK');
		$data["predikat_asli_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'SANGAT BAIK');
		$data["predikat_hasil_baik"] = $this->model_hasil->count_true_predicate('predikat_hasil', 'BAIK');
		$data["predikat_hasil_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_hasil', 'SANGAT BAIK');


		$this->load->view("guru/hasil_pengujian", $data);
		// echo '<pre>';
		// echo json_encode($data);
		// die();
	}
}
