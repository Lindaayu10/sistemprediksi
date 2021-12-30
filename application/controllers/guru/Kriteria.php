<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_kriteria");
        $this->load->library('form_validation');
    }


    public function index()
    {

        if($this->model_kriteria->logged_id())
        {   
            $data["kriteria"] = $this->model_kriteria->getAll();
            $this->load->view("guru/kriteria_list", $data);          
         
        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
          redirect("auth/index");
        }
    }

    //mmenambahkan data ke database
    public function add()
    {
        $kriteria = $this->model_kriteria;
        $validation = $this->form_validation;
        $validation->set_rules($kriteria->rules());

        if ($validation->run()) {
            $kriteria->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("guru/kriteria_new");
    }

    //mengedit data ke database
    public function edit($id_kriteria = null)
    {
        if (!isset($id_kriteria)) redirect('guru/kriteria');

        $kriteria = $this->model_kriteria;
        $validation = $this->form_validation;
        $validation->set_rules($kriteria->rules());

        if ($validation->run()) {
            $kriteria->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kriteria"] = $kriteria->getById($id_kriteria);
        if (!$data["kriteria"]) show_404();
        
        $this->load->view("guru/kriteria_list", $data);
    }

    //menghapus data di database
    public function delete($id_kriteria = null)
    {
        if (!isset($id_kriteria)) show_404();
        
        if ($this->model_kriteria->delete($id_kriteria)) {
            redirect(site_url('guru/kriteria'));
        }
    }

    //public function logout()
    //{
      //  $this->session->sess_destroy();
        //redirect('beranda');
    //}
}
