<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();

        }

	public function index(){
		$data['login']=$this->db->get_where('user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');
		if(!empty($cek) && $level=='guru')
        {
			$data['head']="Validasi";
			$data['title']="Validasi Hasil Sistem";
			$data['hasil'] = $this->Simple_CRUD->getAllData("validasi");

			//count data
			$data['jml_total']=$this->Model_validasi->get_jml("validasi");
			$data['jml_sesuai']=$this->Model_validasi->get_jml_where("validasi","keterangan", "SESUAI");
			$data['jml_tdk_sesuai']=$this->Model_validasi->get_jml_where("validasi","keterangan", "TIDAK SESUAI");

			//hitung persentase
			$data['persen_sesuai'] = @($data['jml_sesuai']['jml'] / $data['jml_total']['jml']*100);
			$data['persen_tdk_sesuai'] = @($data['jml_tdk_sesuai']['jml']/$data['jml_total']['jml']*100);

			$inside['content']=$this->load->view('guru/validasi',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function generate_validasi(){
		$data['log']=$this->db->get_where('guru',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
		if(!empty($cek) && $level=='admin')
        {
        	$this->Model_validasi->DeleteAllData('validasi');
        	$generate_kesimpulan= $this->Model_validasi->generate_table()->result_array();

        	foreach ($generate_kesimpulan as $key => $simpul) {
        		$data = array(
							  'id_kesimpulan'   => $simpul['id_kesimpulan'],
					 		  'tgl_test'   		=> $simpul['tgl_test'],
							  'id_periksa' 		=> $simpul['id_periksa'],
							  'waktu'   		=> $simpul['waktu'],
					 		  'z_total'			=> $simpul['z_total'],
					 		  'nama_kondisi'	=> $simpul['nama_kondisi'],
                      		);
        		$query=$this->Simple_CRUD->insertData('validasi',$data);

        	}
        	redirect("admin/Validasi/index","refresh");

		}
		else
        {
            header('location:'.base_url().'global/login/log');
		}
	}

	public function edit_validasi(){
		$data['log']=$this->db->get_where('guru',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
		if(!empty($cek) && $level=='admin') {
      $data['head']="Validasi";
			$data['title']="Validasi Hasil Sistem";
			$data['data_kesimpulan'] = $this->Simple_CRUD->getAllData("validasi");
			$data['data_periksa'] = $this->Simple_CRUD->getAllData("tb_periksa");
			$data['data_waktu'] = $this->Simple_CRUD->getAllData("tb_waktu");
			$inside['content']=$this->load->view('admin/validasi/edit_validasi',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		} else {
      header('location:'.base_url().'global/login/log');
		}
	}


	public function update_validasi(){
		$data['log']=$this->db->get_where('guru',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');
		if(!empty($cek) && $level=='admin')
        {
			$pakar = $this->input->post('pakar');
			$id_validasi = $this->input->post('id_validasi');

			$row_count = count($pakar);

			for ($i=0; $i < $row_count; $i++) {
				$sistem = $this->Model_validasi->get_dengan_where('validasi','nama_kondisi','id_validasi',$id_validasi[$i])->row_array();
				if($sistem['nama_kondisi'] == $pakar[$i]){
					$keterangan = "SESUAI";
				}else{
					$keterangan = "TIDAK SESUAI";
				}

				$data = array(
					'validasi_pakar' => $pakar[$i],
					'keterangan'     => $keterangan
				);

	 			$query=$this->Model_validasi->updateData('validasi',$data,'id_validasi',$id_validasi[$i]);
			}
			redirect("admin/Validasi/index","refresh");

		}
		else
        {
            header('location:'.base_url().'global/login/log');
		}
	}
}
