<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();

        }

	public function index()
	{
		if ($this->model_validasi->logged_id()) {
			$data["sangat_baik_sangat_baik"] = $this->model_validasi->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'SANGAT BAIK');
			$data["sangat_baik_baik"] = $this->model_validasi->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'BAIK');
			$data["baik_sangat_baik"] = $this->model_validasi->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'SANGAT BAIK');
			$data["baik_baik"] = $this->model_validasi->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'BAIK');

			$data["total_k"] = $data["sangat_baik_sangat_baik"] + $data["sangat_baik_baik"] + $data["baik_sangat_baik"] + $data["baik_baik"];
			$data['total_t_f'] = $data["sangat_baik_sangat_baik"] + $data["baik_baik"];

			$data['accuracy'] = $data["total_t_f"] / $data["total_k"] * 100;

			// validasi
			$allVal = $this->model_validasi->getAll();
			$true = 1;
			$false = 1;
			foreach ($allVal as $key => $item) {
				if($item->predikat_asli === $item->predikat_hasil){
					$data['sesuai'] = $true++;

				}else{
					$data['tidak_sesuai'] = $false++;
				}
				
			}
			$data['countAll'] = $this->model_validasi->count();
	
			$data['persen_sesuai'] = $data['sesuai'] / $data['countAll'] * 100;
			$data['persen_tidak_sesuai'] = $data['tidak_sesuai'] / $data['countAll'] * 100;


			$this->load->view("guru/hasil_pengujian", $data);
		} else {

			// jika session belum terdaftar, maka redirect ke halaman login
			redirect("auth/index");
		}
	}
}
