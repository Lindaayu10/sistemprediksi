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
		$data["sangat_baik_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'SANGAT BAIK');
		$data["sangat_baik_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'BAIK');
		$data["baik_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'SANGAT BAIK');
		$data["baik_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'BAIK');

		$data["total_k"] = $data["sangat_baik_sangat_baik"] + $data["sangat_baik_baik"] + $data["baik_sangat_baik"] + $data["baik_baik"];
		$data['total_t_f'] = $data["sangat_baik_sangat_baik"] + $data["baik_baik"];

		$data['accuracy'] = $data["total_t_f"] / $data["total_k"] * 100;

		$this->load->view("guru/hasil_pengujian", $data);
		// echo '<pre>';
		// echo json_encode($data);
		// die();
	}
}
