<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dataadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_dataadmin");
        $this->load->library('form_validation');
    }
 

    public function index()
    {

        if($this->model_dataadmin->logged_id())
        {   
            $data["user"] = $this->model_dataadmin->getAll();
            $this->load->view("admin/admin_list", $data);          
         
        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
          //  redirect("sistemprediksi");
        }
    }

    //mmenambahkan data ke database
    public function add()
    {
        $user = $this->model_dataadmin;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules()); 

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/admin_new");
    }

    //mengedit data ke database
    public function edit($id_user = null)
    {
        if (!isset($id_user)) redirect('admin/dataadmin');

        $user = $this->model_dataadmin;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id_user);
        if (!$data["user"]) show_404();
        
        $this->load->view("admin/admin_edit", $data);
    }

    //menghapus data di database
    public function delete($id_user = null)
    {
        if (!isset($id_user)) show_404();
        
        if ($this->model_dataadmin->delete($id_user)) {
            redirect(site_url('admin/dataadmin'));
        }
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('sistemprediksi');
    }
}
