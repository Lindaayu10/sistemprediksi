<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dataguru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("model_dataguru");
		$this->load->library('form_validation');
	}


	public function index()
	{

		if ($this->model_dataguru->logged_id()) {
			$data["guru"] = $this->model_dataguru->getAll();
			$this->load->view("admin/guru_list", $data);
		} else {
			redirect("auth/index");
		}
	}

	//mmenambahkan data ke database
	public function add()
	{
		$guru = $this->model_dataguru;
		$validation = $this->form_validation;
		$validation->set_rules($guru->rules());

		if ($validation->run()) {
			$guru->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view("admin/guru_new");
	}

	//mengedit data ke database
	public function edit($id_guru = null)
	{
		if (!isset($id_guru)) redirect('admin/dataguru');

		$guru = $this->model_dataguru;
		$validation = $this->form_validation;
		$validation->set_rules($guru->rules());

		if ($validation->run()) {
			$guru->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["guru"] = $guru->getById($id_guru);
		if (!$data["guru"]) show_404();

		$this->load->view("admin/guru_edit", $data);
	}

	//menghapus data di database
	public function delete($id_guru = null)
	{
		if (!isset($id_guru)) show_404();

		if ($this->model_dataguru->delete($id_guru)) {
			redirect(site_url('admin/dataguru'));
		}
	}

	//public function logout()
	//{
	//  $this->session->sess_destroy();
	//redirect('beranda');
	//}
}
