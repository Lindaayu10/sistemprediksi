<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Import_ujiakurasi extends CI_Controller {

        public function index()
        {
            $data['uji_akurasi'] = 'Import Excel';
            $data['uji_akurasi'] = $this->db->get('uji_akurasi')->result();
            $this->load->view('import/index', $data);
        }

        public function create()
        {
            $data['uji_akurasi'] = "Upload File Excel";
            $this->load->view('import/create', $data);
        }

        public function excel()
        {
            if(isset($_FILES["file"]["name"])){
                  // upload
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
                
                $object = PHPExcel_IOFactory::load($file_tmp);
        
                foreach($object->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=6; $row<=$highestRow; $row++){
        
                        $nama_siswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $jenkel = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $pengetahuan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $ketrampilan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $spiritual = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $sosial = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $predikat_asli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();


                        $data[] = array(
                            'nama_siswa'       =>$nama_siswa,
                            'jenkel'           =>$jenkel,
                            'pengetahuan'      =>$pengetahuan,
                            'ketrampilan'      =>$ketrampilan,
                            'spiritual'        =>$spiritual,
                            'sosial'           =>$sosial,
                            'predikat_asli'    =>$predikat_asli,
                        );
                        echo "<pre>"; var_dump($data); echo "</pre>"; die();
        
                    } 
        
                }
        
                $this->db->insert_batch('uji_akurasi', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import_ujiakurasi');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import_ujiakurasi');
            }
        }

    }

    /* End of file Import.php */
    /* Location: ./application/controllers/Import.php */