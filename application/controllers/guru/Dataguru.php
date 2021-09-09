<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dataguru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_dataguru");
        $this->load->library('form_validation');
    }


    public function index()
    {

        if($this->model_dataguru->logged_id())
        {   
            $data["guru"] = $this->model_dataguru->getAll();
            $this->load->view("guru/guru_list", $data);          
         
        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
          redirect("login");
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

        $this->load->view("guru/guru_new");
    }

    //mengedit data ke database
    public function edit($id_guru = null)
    {
        if (!isset($id_guru)) redirect('guru/dataguru');

        $guru = $this->model_dataguru;
        $validation = $this->form_validation;
        $validation->set_rules($guru->rules());

        if ($validation->run()) {
            $guru->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["guru"] = $guru->getById($id_guru);
        if (!$data["guru"]) show_404();
        
        $this->load->view("guru/guru_edit", $data);
    }

    //menghapus data di database
    public function delete($id_guru = null)
    {
        if (!isset($id_guru)) show_404();
        
        if ($this->model_dataguru->delete($id_guru)) {
            redirect(site_url('guru/dataguru'));
        }
    }

    //public function logout()
    //{
      //  $this->session->sess_destroy();
        //redirect('beranda');
    //}
}
