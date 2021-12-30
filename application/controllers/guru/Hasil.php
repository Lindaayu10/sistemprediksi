<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_hasil");
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->model_hasil->logged_id()) {
			$data["sangat_baik_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'SANGAT BAIK');
			$data["sangat_baik_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'SANGAT BAIK', 'predikat_hasil', 'BAIK');
			$data["baik_sangat_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'SANGAT BAIK');
			$data["baik_baik"] = $this->model_hasil->count_true_predicate('predikat_asli', 'BAIK', 'predikat_hasil', 'BAIK');

			$data["total_k"] = $data["sangat_baik_sangat_baik"] + $data["sangat_baik_baik"] + $data["baik_sangat_baik"] + $data["baik_baik"];
			$data['total_t_f'] = $data["sangat_baik_sangat_baik"] + $data["baik_baik"];

			$data['accuracy'] = $data["total_t_f"] / $data["total_k"] * 100;

			// k fold val

			
			$allVal = $this->model_hasil->getAll();
			$true = 1;
			$false = 1;
			foreach ($allVal as $key => $item) {
				if($item->predikat_asli === $item->predikat_hasil){
					$data['sesuai'] = $true++;

				}else{
					$data['tidak_sesuai'] = $false++;
				}
				
			}
			$data['countAll'] = $this->model_hasil->count();
	
			$data['persen_sesuai'] = $data['sesuai'] / $data['countAll'] * 100;
			$data['persen_tidak_sesuai'] = $data['tidak_sesuai'] / $data['countAll'] * 100;


			$this->load->view("guru/hasil_pengujian", $data);
		} else {

			// jika session belum terdaftar, maka redirect ke halaman login
			redirect("auth/index");
		}
	}

	//mmenambahkan data ke database
	public function add()
	{
		$hasil = $this->model_hasil;
		$validation = $this->form_validation;
		$validation->set_rules($hasil->rules());

		if ($validation->run()) {
			$hasil->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view("guru/hasil_new");
	}

	//mengedit data ke database
	public function edit($id_hasil = null)
	{
		if (!isset($id_hasil)) redirect('guru/hasil');

		$hasil = $this->model_hasil;
		$validation = $this->form_validation;
		$validation->set_rules($hasil->rules());

		if ($validation->run()) {
			$hasil->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["hasil"] = $hasil->getById($id_hasil);
		if (!$data["hasil"]) show_404();

		$this->load->view("guru/hasil_edit", $data);
	}

	//menghapus data di database
	public function delete($id_hasil = null)
	{
		if (!isset($id_hasil)) show_404();

		if ($this->model_hasil->delete($id_hasil)) {
			redirect(site_url('guru/hasil'));
		}
	}

	//public function logout()
	//{
	//  $this->session->sess_destroy();
	//redirect('beranda');
	//}
}
