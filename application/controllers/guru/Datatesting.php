<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class datatesting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_datatesting");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->model_datatesting->logged_id())
        {   
            $data["datatesting"] = $this->model_datatesting->getAll();
            $this->load->view("guru/datatesting", $data); 
        }else{

           // jika session belum terdaftar, maka redirect ke halaman dashboard
           redirect("login");
        }

    }
    public function excel()
    {
        // echo "<pre>"; var_dump($_FILES); echo "</pre>"; die();
        if(isset($_FILES["file_datatesting"]["name"])){
              // upload
            $file_tmp = $_FILES['file_datatesting']['tmp_name'];
            $file_name = $_FILES['file_datatesting']['name'];
            $file_size =$_FILES['file_datatesting']['size'];
            $file_type=$_FILES['file_datatesting']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=2; $row<=$highestRow; $row++){
    
                    $nama_siswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jenkel = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $pengetahuan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $ketrampilan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $spiritual = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sosial = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $predikat_asli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();


                    $data[] = array(
                        'nama_siswa'        =>$nama_siswa,
                        'jenkel'            =>$jenkel,
                        'pengetahuan'       =>$pengetahuan,
                        'ketrampilan'       =>$ketrampilan,
                        'spiritual'         =>$spiritual,
                        'sosial'            =>$sosial,
                        'predikat_asli'     =>$predikat_asli,
                    );
                    // echo "<pre>"; var_dump($data); echo "</pre>"; die();

                } 
    
            }
    
            $this->db->insert_batch('datatesting', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('guru/Datatesting');
        }
        else
        {
             $message = array(
                'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('import');
        }
    }
    
    //menambahkan data ke database
    public function add()
    {
        $datatesting = $this->model_datatesting;
        $validation = $this->form_validation;
        $validation->set_rules($datatesting->rules());

        if ($validation->run()) {
            $datatesting->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("guru/datatesting_new");
    }

    //mengedit data ke database
    public function edit($id_datatesting = null)
    {
        if (!isset($id_datatesting)) redirect('guru/datatesting');
       
        $datatesting = $this->model_datatesting;
        $validation = $this->form_validation;
        $validation->set_rules($datatesting->rules());

        if ($validation->run()) {
            $datatesting->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["datatesting"] = $datatesting->getById($id_datatesting);
        if (!$data["datatesting"]) show_404();
        
        $this->load->view("guru/datatesting_edit", $data);
    }  
   
    //menghapus data di database
    public function delete()
    {
        if ($this->db->empty_table('datatesting')) {
            redirect(site_url('guru/datatesting'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }


}

