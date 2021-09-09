<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_hasil");
        $this->load->library('form_validation');
    }
 
    public function index()
    {
        if($this->model_hasil->logged_id())
        {   
            $data["hasil"] = $this->model_hasil->getAll();
            $this->load->view("admin/hasil_list", $data); 
        }else{

           // jika session belum terdaftar, maka redirect ke halaman login
           redirect("auth/index");
        }
    }

    // //mmenambahkan data ke database
    // public function add()
    // {
    //     $hasil = $this->model_hasil;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($hasil->rules());

    //     if ($validation->run()) {
    //         $hasil->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/hasil_new");
    // }

    // //mengedit data ke database
    // public function edit($id_hasil = null)
    // {
    //     if (!isset($id_hasil)) redirect('admin/hasil');

    //     $hasil = $this->model_hasil;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($hasil->rules());

    //     if ($validation->run()) {
    //         $hasil->update();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $data["hasil"] = $hasil->getById($id_hasil);
    //     if (!$data["hasil"]) show_404();
        
    //     $this->load->view("admin/hasil_edit", $data);
    // }

    // //menghapus data di database
    // public function delete($id_hasil = null)
    // {
    //     if (!isset($id_hasil)) show_404();
        
    //     if ($this->model_hasil->delete($id_hasil)) {
    //         redirect(site_url('admin/hasil'));
    //     }
    // }

    //public function logout()
    //{
      //  $this->session->sess_destroy();
        //redirect('beranda');
    //}
}
