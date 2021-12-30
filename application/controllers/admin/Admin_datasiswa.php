 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_datasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_datasiswa");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->model_datasiswa->logged_id())
        {   
            $data["datasiswa"] = $this->model_datasiswa->getAll();
            $this->load->view("admin/datasiswa_list", $data); 
        }else{

           // jika session belum terdaftar, maka redirect ke halaman dashboard
           redirect("auth/index");
        }

    }
    
    //menambahkan data ke database
    public function add()
    {
        $datasiswa = $this->model_datasiswa;
        $validation = $this->form_validation;
        $validation->set_rules($datasiswa->rules());

        if ($validation->run()) {
            $datasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/datasiswa_new");
    }

    //mengedit data ke database
    public function edit($id_datasiswa = null)
    {
        if (!isset($id_datasiswa)) redirect('admin/datasiswa');
       
        $datasiswa = $this->model_datasiswa;
        $validation = $this->form_validation;
        $validation->set_rules($datasiswa->rules());

        if ($validation->run()) {
            $datasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["datasiswa"] = $datasiswa->getById($id_datasiswa);
        if (!$data["datasiswa"]) show_404();
        
        $this->load->view("admin/datasiswa_edit", $data);
    }  
   
    //menghapus data di database
    public function delete($id_datasiswa = null)
    {
        if (!isset($id_datasiswa)) show_404();
        
        if ($this->model_datasiswa->delete($id_datasiswa)) {
            redirect(site_url('admin/datasiswa'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }


}

