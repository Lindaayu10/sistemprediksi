<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class datatrining extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_datatrining");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->model_datatrining->logged_id())
        {   
            $data["datatrining"] = $this->model_datatrining->getAll();
            $this->load->view("guru/datatrining", $data); 
        }else{

           // jika session belum terdaftar, maka redirect ke halaman dashboard
           redirect("auth/index");
        }

    }

    public function excel()
    {
        // echo "<pre>"; var_dump($_FILES); echo "</pre>"; die();
        if(isset($_FILES["file_datatrining"]["name"])){
              // upload

            $file_tmp = $_FILES['file_datatrining']['tmp_name'];
            $file_name = $_FILES['file_datatrining']['name'];
            $file_size =$_FILES['file_datatrining']['size'];
            $file_type=$_FILES['file_datatrining']['type'];
            move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            $file = './uploads/'.$file_name;
            
            $object = PHPExcel_IOFactory::load($file);
        // echo "<pre>"; var_dump($file); echo "</pre>"; die();
    
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
    
            $this->db->insert_batch('datatrining', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('guru/Datatrining');
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
        $datatrining = $this->model_datatrining;
        $validation = $this->form_validation;
        $validation->set_rules($datatrining->rules());

        if ($validation->run()) {
            $datatrining->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("guru/datatrining_new");
    }

    //mengedit data ke database
    public function edit($id_datatrining = null)
    {
        if (!isset($id_datatrining)) redirect('guru/datatrining');
       
        $datatrining = $this->model_datatrining;
        $validation = $this->form_validation;
        $validation->set_rules($datatrining->rules());

        if ($validation->run()) {
            $datatrining->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["datatrining"] = $datatrining->getById($id_datatrining);
        if (!$data["datatrining"]) show_404();
        
        $this->load->view("guru/datatrining_edit", $data);
    }  
   
    //menghapus data di database
    public function delete($id_datatrining = null)
    {
       if ($this->db->empty_table('datatrining')) {
            redirect(site_url('guru/datatrining'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('guru/dashboard');
    }


}

