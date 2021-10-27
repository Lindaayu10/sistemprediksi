 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ujiakurasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_ujiakurasi");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->model_ujiakurasi->logged_id())
        {   
            $data["uji_akurasi"] = $this->db->get('hasil')->result_array();
            $data["akurasi"] = $this->db->from('akurasi')->order_by('id_akurasi', 'DESC')->get()->result()[0] ?? [];
            $this->load->view("admin/uji_akurasi", $data); 
        }else{

           // jika session belum terdaftar, maka redirect ke halaman login
           redirect("login");
        }

    }
       public function naivebayes()
       {
        $this->db->empty_table('hasil');
        $this->db->empty_table('dentitas_gauss');
        $this->db->empty_table('akurasi');

        $total=$this->db->count_all_results('datatrining');
        $all_data=$this->db->get('datatrining')->result();

        $nilai_kelas_sb=$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining')/$total;
        $nilai_kelas_sb=number_format($nilai_kelas_sb, 2, '.', '');
        $nilai_kelas_b=$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining')/$total;
        $nilai_kelas_b=number_format($nilai_kelas_b, 2, '.', '');
        
        //Kriteria Jenis Kelamin
        $nilai_jenkel_lsb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("jenkel", "L")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_jenkel_lsb=number_format($nilai_jenkel_lsb, 2, '.', '');
        $nilai_jenkel_psb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("jenkel", "P")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_jenkel_psb=number_format($nilai_jenkel_psb, 2, '.', '');
        $nilai_jenkel_lb=$this->db->where("predikat_asli", "BAIK")->where("jenkel", "L")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_jenkel_lb=number_format($nilai_jenkel_lb, 2, '.', '');
        $nilai_jenkel_pb=$this->db->where("predikat_asli", "BAIK")->where("jenkel", "P")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_jenkel_pb=number_format($nilai_jenkel_pb, 2, '.', '');
        
        //Kriteria Pengetahuan 
        //mean 
        $nilai_mean_pengetahuansb=$this->db->select_avg('pengetahuan')->where("predikat_asli", "SANGAT BAIK")->get('datatrining')->result()[0]->pengetahuan;
        $nilai_mean_pengetahuanb=$this->db->select_avg('pengetahuan')->where("predikat_asli", "BAIK")->get('datatrining')->result()[0]->pengetahuan;

        $data_pengetahuansb=$this->db->where("predikat_asli", "SANGAT BAIK")->get('datatrining')->result();
        $nilai_mean_pengetahuansb=number_format($nilai_mean_pengetahuansb, 1, '.', '');
        $nilai_mean_pengetahuanb=number_format($nilai_mean_pengetahuanb, 1, '.', '');
        
        //stedev sangat baik
        $total_sb=$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');

        $total_nilai_sampel=0;
        foreach($data_pengetahuansb as $pengetahuansb){
            $total_nilai_sampel+=pow(($pengetahuansb->pengetahuan-$nilai_mean_pengetahuansb), 2);
        }
        $nilai_pembagian=$total_nilai_sampel/($total_sb-1);
        $standar_deviasi_pengetahuansb=sqrt($nilai_pembagian);
        $standar_deviasi_pengetahuansb=number_format($standar_deviasi_pengetahuansb, 2, '.', '');
        
        //stdev baik
        $data_pengetahuanb=$this->db->select('pengetahuan')->where("predikat_asli", "BAIK")->get('datatrining')->result();

        $total_b=$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');

        $total_nilai_sampel=0;
        foreach($data_pengetahuanb as $pengetahuanb){
            $total_nilai_sampel+=pow(($pengetahuanb->pengetahuan-$nilai_mean_pengetahuanb), 2);
        }
        $nilai_pembagian=$total_nilai_sampel/($total_b-1);
        $standar_deviasi_pengetahuanb=sqrt($nilai_pembagian);
        $standar_deviasi_pengetahuanb=number_format($standar_deviasi_pengetahuanb, 2, '.', '');

        //Kriteria ketrampilan
        //mean
        $nilai_mean_ketrampilansb=$this->db->select_avg('ketrampilan')->where("predikat_asli", "SANGAT BAIK")->get('datatrining')->result()[0]->ketrampilan;

        $nilai_mean_ketrampilanb=$this->db->select_avg('ketrampilan')->where("predikat_asli", "BAIK")->get('datatrining')->result()[0]->ketrampilan;

        $data_ketrampilansb=$this->db->where("predikat_asli", "SANGAT BAIK")->get('datatrining')->result();
        $nilai_mean_ketrampilansb=number_format($nilai_mean_ketrampilansb, 1, '.', '');
        $nilai_mean_ketrampilanb=number_format($nilai_mean_ketrampilanb, 1, '.', '');


        //stdev sangat baik
        $total_sb=$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $total_nilai_sampel=0;
        foreach($data_ketrampilansb as $ketrampilansb){
            $total_nilai_sampel+=pow(($ketrampilansb->ketrampilan-$nilai_mean_ketrampilansb), 2);
        }
        $nilai_pembagian=$total_nilai_sampel/($total_sb-1);
        $standar_deviasi_ketrampilansb=sqrt($nilai_pembagian);
        $standar_deviasi_ketrampilansb=number_format($standar_deviasi_ketrampilansb, 2, '.', '');
        //echo "<pre>"; var_dump($standar_deviasi_ketrampilansb); echo "</pre>"; die();

        //stdev baik
        $data_ketrampilanb=$this->db->where("predikat_asli", "BAIK")->get('datatrining')->result();
        $total_b=$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $total_nilai_sampel=0;
        foreach($data_ketrampilanb as $ketrampilanb){
            $total_nilai_sampel+=pow(($ketrampilanb->ketrampilan-$nilai_mean_ketrampilanb), 2);
        }
        $nilai_pembagian=$total_nilai_sampel/($total_b-1);
        $standar_deviasi_ketrampilanb=sqrt($nilai_pembagian);
        $standar_deviasi_ketrampilanb=number_format($standar_deviasi_ketrampilanb, 2, '.', '');
        // echo "<pre>"; var_dump('Aaaaa$', $standar_deviasi_ketrampilanb); echo "</pre>"; die();

        // echo "<pre>"; var_dump(
        //     $standar_deviasi_pengetahuansb, $standar_deviasi_pengetahuanb,
        //     $standar_deviasi_ketrampilansb, $standar_deviasi_ketrampilanb
        // ); echo "</pre>"; die();

        // ======================================
        // =
        // =            Bataas meragukan
        // =
        // ======================================

        $all_data = [];
        $all_data = $this->db->get('datatesting')->result();
        $total = count($all_data);

        //dentitas gauss
        for($i=0;$i<$total;$i++){
            // =1/SQRT(2*3.14*E107)*EXP(-((D120-E102)^2)/((2*E107)^2))
            $gauss_pengetahuansb = 1/sqrt(2*3.14*$standar_deviasi_pengetahuansb)*exp(-(pow($all_data[$i]->pengetahuan-$nilai_mean_pengetahuansb, 2))/(pow(2*$standar_deviasi_pengetahuansb, 2)));

            $gauss_pengetahuanb= 1/sqrt(2*3.14*$standar_deviasi_pengetahuanb)*exp(-(pow($all_data[$i]->pengetahuan-$nilai_mean_pengetahuanb, 2))/(pow(2*$standar_deviasi_pengetahuanb, 2)));
            //echo number_format($gauss_pengetahuanb, 3, '.', '')."<br>";

            $gauss_ketrampilansb= 1/sqrt(2*3.14*$standar_deviasi_ketrampilansb)*exp(-(pow($all_data[$i]->ketrampilan-$nilai_mean_ketrampilansb, 2))/(pow(2*$standar_deviasi_ketrampilansb, 2)));
            //echo number_format($gaus_ketrampilansb, 3, '.', '')."<br>";

            $gauss_ketrampilanb= 1/sqrt(2*3.14*$standar_deviasi_ketrampilanb)*exp(-(pow($all_data[$i]->ketrampilan-$nilai_mean_ketrampilanb, 2))/(pow(2*$standar_deviasi_ketrampilanb, 2)));
             // echo number_format($gauss_ketrampilanb, 3, '.', '')."<br>";

            $insert = [ 
                'pengetahuan' => ($all_data[$i]->pengetahuan),
                'pengetahuan_sb' => number_format($gauss_pengetahuansb, 3, '.', ''),
                'pengetahuan_b' => number_format($gauss_pengetahuanb, 3, '.', ''),
                'ketrampilan' =>($all_data[$i]->ketrampilan),
                'ketrampilan_sb' => number_format($gauss_ketrampilansb, 3, '.', ''),
                'ketrampilan_b' => number_format($gauss_ketrampilanb, 3, '.', ''),
            ];
            $this->db->insert('dentitas_gauss',$insert);
        }
      
        //Kriteria Spiritual
        $nilai_spiritual_asb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("spiritual", "A")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_spiritual_asb=number_format($nilai_spiritual_asb, 2, '.', '');
        
        $nilai_spiritual_bsb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("spiritual", "B")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_spiritual_bsb=number_format($nilai_spiritual_bsb, 2, '.', '');
             
        $nilai_spiritual_ab=$this->db->where("predikat_asli", "BAIK")->where("spiritual", "A")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_spiritual_ab=number_format($nilai_spiritual_ab, 2, '.', '');
        $nilai_spiritual_bb=$this->db->where("predikat_asli", "BAIK")->where("spiritual", "B")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_spiritual_bb=number_format($nilai_spiritual_bb, 2, '.', '');

        //Kriteria Sosial
        $nilai_sosial_asb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("sosial", "A")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_sosial_asb=number_format($nilai_sosial_asb, 2, '.', '');
        $nilai_sosial_bsb=$this->db->where("predikat_asli", "SANGAT BAIK")->where("sosial", "B")->count_all_results('datatrining')/$this->db->where("predikat_asli", "SANGAT BAIK")->count_all_results('datatrining');
        $nilai_sosial_bsb=number_format($nilai_sosial_bsb, 2, '.', '');

        $nilai_sosial_ab=$this->db->where("predikat_asli", "BAIK")->where("sosial", "A")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_sosial_ab=number_format($nilai_sosial_ab, 2, '.', '');
        $nilai_sosial_bb=$this->db->where("predikat_asli", "BAIK")->where("sosial", "B")->count_all_results('datatrining')/$this->db->where("predikat_asli", "BAIK")->count_all_results('datatrining');
        $nilai_sosial_bb=number_format($nilai_sosial_bb, 2, '.', '');
        // echo "<pre>"; var_dump(
        //     $nilai_spiritual_asb,
        //     $nilai_spiritual_bsb,
        //     $nilai_spiritual_ab,
        //     $nilai_spiritual_bb,
        //     $nilai_sosial_asb,
        //     $nilai_sosial_bsb,
        //     $nilai_sosial_ab,
        //     $nilai_sosial_bb,
        // ); echo "</pre>"; die(); 
        
        //Probabilitas kelas x nilai jenis kelamin x nilai dentitas gauss pengetahuan sb x dentitas gauss ketrampilan sb x nilai spiritual x nilai sosial
        $all_data_gauss=$this->db->get('dentitas_gauss')->result();
        $correct = 0;
        for ($i=0;$i<$total;$i++) { 
            if ($all_data[$i]->jenkel==='L' || $all_data[$i]->jenkel==='l') {
                $temp_jenkel_sb=$nilai_jenkel_lsb;
                $temp_jenkel_b=$nilai_jenkel_lb;
            }else{
                $temp_jenkel_sb=$nilai_jenkel_psb;
                $temp_jenkel_b=$nilai_jenkel_pb;
            }
            if ($all_data[$i]->spiritual==='A' || $all_data[$i]->spiritual==='a') {
                $temp_spiritual_sb=$nilai_spiritual_asb;
                $temp_spiritual_b=$nilai_spiritual_ab;
            }else{
                $temp_spiritual_sb=$nilai_spiritual_bsb;
                $temp_spiritual_b=$nilai_spiritual_bb;
            }
            if ($all_data[$i]->sosial==='A' || $all_data[$i]->sosial==='a') {
                $temp_sosial_sb=$nilai_sosial_asb;
                $temp_sosial_b=$nilai_sosial_ab;
            }else{
                $temp_sosial_sb=$nilai_sosial_bsb;
                $temp_sosial_b=$nilai_sosial_bb;
            }
            
            $nilai_prediksi_sb=$nilai_kelas_sb * $temp_jenkel_sb * $all_data_gauss[$i]->pengetahuan_sb * $all_data_gauss[$i]->ketrampilan_sb * $temp_spiritual_sb * $temp_sosial_sb;
            $nilai_prediksi_b=$nilai_kelas_b * $temp_jenkel_b * $all_data_gauss[$i]->pengetahuan_b * $all_data_gauss[$i]->ketrampilan_b * $temp_spiritual_b * $temp_sosial_b;
            //echo "<pre>"; var_dump($nilai_prediksi_sb,$nilai_prediksi_b); echo "</pre>"; die();

             $insert = [ 
                'nama_siswa' => ($all_data[$i]->nama_siswa),
                'jenkel' => ($all_data[$i]->jenkel),
                'pengetahuan' => ($all_data[$i]->pengetahuan),
                'ketrampilan' =>($all_data[$i]->ketrampilan),
                'spiritual' => ($all_data[$i]->spiritual),
                'sosial' => ($all_data[$i]->sosial),
                'nilai_sangatbaik' => number_format($nilai_prediksi_sb, 6, '.', ''),
                'nilai_baik' => number_format($nilai_prediksi_b, 6, '.', ''),
                'predikat_asli' => ($all_data[$i]->predikat_asli),
                'predikat_hasil' => ($nilai_prediksi_sb > $nilai_prediksi_b ? 'SANGAT BAIK' : 'BAIK'),
            ];
            $this->db->insert('hasil',$insert);
            if ($all_data[$i]->predikat_asli === ($nilai_prediksi_sb > $nilai_prediksi_b ? 'SANGAT BAIK' : 'BAIK')) {
                $correct++;
            }
        }

        $akurasi = [
            'akurasi_testing' => $correct/count($all_data)
        ];
        $this->db->insert('akurasi',$akurasi);

				 $insertModel = [
					 'probabilitas_kelas_sb' => $nilai_kelas_sb,
					 'probabilitas_kelas_b' => $nilai_kelas_b,
					 'jenkel_lsb' => $nilai_jenkel_lsb,
					 'jenkel_lb' => $nilai_jenkel_lb,
					 'jenkel_psb' => $nilai_jenkel_psb,
					 'jenkel_pb' => $nilai_jenkel_pb,
					 'mean_pengetahuan_sb' => $nilai_mean_pengetahuansb,
					 'mean_pengetahuan_b' => $nilai_mean_pengetahuanb,
					 'mean_keterampilan_sb' => $nilai_mean_ketrampilansb,
					 'mean_keterampilan_b' => $nilai_mean_ketrampilanb,
					 'stdev_pengetahuan_sb' => $standar_deviasi_pengetahuansb,
					 'stdev_pengetahuan_b' => $standar_deviasi_pengetahuanb,
					 'stdev_keterampilan_sb' => $standar_deviasi_ketrampilansb,
					 'stdev_keterampilan_b' => $standar_deviasi_ketrampilanb,
					 'spiritual_asb' => $nilai_spiritual_asb,
					 'spiritual_ab' => $nilai_spiritual_ab,
					 'spiritual_bsb' => $nilai_spiritual_bsb,
					 'spiritual_bb' => $nilai_spiritual_bb,
					 'sosial_asb' => $nilai_sosial_asb,
					 'sosial_ab' => $nilai_sosial_ab,
					 'sosial_bsb' => $nilai_sosial_bsb,
					 'sosial_bb' => $nilai_sosial_bb,
				 ];

				 $this->model_ujiakurasi->storeModel($insertModel);

        redirect($_SERVER['HTTP_REFERER']);

       }

			public function testData()
			{
				$request = $this->input->post();
				$model = $this->model_ujiakurasi->getModel();

				$nilai_kelas_sb	= $model->probabilitas_kelas_sb;
				$nilai_kelas_b	= $model->probabilitas_kelas_b;

				$nilai_jenkel_lsb			= $model->jenkel_lsb;
				$nilai_jenkel_lb			= $model->jenkel_lb;
				$nilai_jenkel_psb			= $model->jenkel_psb;
				$nilai_jenkel_pb			= $model->jenkel_pb;

				$nilai_mean_pengetahuansb	= $model->mean_pengetahuan_sb;
				$nilai_mean_pengetahuanb	= $model->mean_pengetahuan_b;
				$nilai_mean_ketrampilansb	= $model->mean_keterampilan_sb;
				$nilai_mean_ketrampilanb	= $model->mean_keterampilan_b;

				$standar_deviasi_pengetahuansb	= $model->stdev_pengetahuan_sb;
				$standar_deviasi_pengetahuanb		= $model->stdev_pengetahuan_b;
				$standar_deviasi_ketrampilansb	= $model->stdev_keterampilan_sb;
				$standar_deviasi_ketrampilanb		= $model->stdev_keterampilan_b;

				$nilai_spiritual_asb	= $model->spiritual_asb;
				$nilai_spiritual_ab		= $model->spiritual_ab;
				$nilai_spiritual_bsb	= $model->spiritual_bsb;
				$nilai_spiritual_bb		= $model->spiritual_bb;
				$nilai_sosial_asb			= $model->sosial_asb;
				$nilai_sosial_ab			= $model->sosial_ab;
				$nilai_sosial_bsb			= $model->sosial_bsb;
				$nilai_sosial_bb			= $model->sosial_bb;

				if ($request['jk']==='L' || $request['jk']==='l') {
					$temp_jenkel_sb	=	$nilai_jenkel_lsb;
					$temp_jenkel_b	=	$nilai_jenkel_lb;
				}else{
					$temp_jenkel_sb	=	$nilai_jenkel_psb;
					$temp_jenkel_b	=	$nilai_jenkel_pb;
				}
				if ($request['spiritual']==='A' || $request['spiritual']==='a') {
					$temp_spiritual_sb	=	$nilai_spiritual_asb;
					$temp_spiritual_b		=	$nilai_spiritual_ab;
				}else{
					$temp_spiritual_sb	=	$nilai_spiritual_bsb;
					$temp_spiritual_b		=	$nilai_spiritual_bb;
				}
				if ($request['sosial']==='A' || $request['sosial']==='a') {
					$temp_sosial_sb	=	$nilai_sosial_asb;
					$temp_sosial_b	=	$nilai_sosial_ab;
				}else{
					$temp_sosial_sb	=	$nilai_sosial_bsb;
					$temp_sosial_b	=	$nilai_sosial_bb;
				}

				$gauss_pengetahuansb = 1/sqrt(2*3.14*$standar_deviasi_pengetahuansb)*exp(-(pow($request['pengetahuan']-$nilai_mean_pengetahuansb, 2))/(pow(2*$standar_deviasi_pengetahuansb, 2)));

				$gauss_pengetahuanb= 1/sqrt(2*3.14*$standar_deviasi_pengetahuanb)*exp(-(pow($request['pengetahuan']-$nilai_mean_pengetahuanb, 2))/(pow(2*$standar_deviasi_pengetahuanb, 2)));

				$gauss_ketrampilansb= 1/sqrt(2*3.14*$standar_deviasi_ketrampilansb)*exp(-(pow($request['keterampilan']-$nilai_mean_ketrampilansb, 2))/(pow(2*$standar_deviasi_ketrampilansb, 2)));

				$gauss_ketrampilanb= 1/sqrt(2*3.14*$standar_deviasi_ketrampilanb)*exp(-(pow($request['keterampilan']-$nilai_mean_ketrampilanb, 2))/(pow(2*$standar_deviasi_ketrampilanb, 2)));


				$nilai_prediksi_sb	=	$nilai_kelas_sb * $temp_jenkel_sb * $gauss_pengetahuansb * $gauss_ketrampilansb * $temp_spiritual_sb * $temp_sosial_sb;
				$nilai_prediksi_b		=	$nilai_kelas_b * $temp_jenkel_b * $gauss_pengetahuanb * $gauss_ketrampilanb * $temp_spiritual_b * $temp_sosial_b;

				$insert = [
					'nama_siswa' => ($request['nama_siswa']),
					'jenkel' => ($request['jk']),
					'pengetahuan' => ($request['pengetahuan']),
					'ketrampilan' =>($request['keterampilan']),
					'spiritual' => ($request['spiritual']),
					'sosial' => ($request['sosial']),
					'nilai_sangatbaik' => number_format($nilai_prediksi_sb, 6, '.', ''),
					'nilai_baik' => number_format($nilai_prediksi_b, 6, '.', ''),
					'predikat_asli' => '-',
					'predikat_hasil' => ($nilai_prediksi_sb > $nilai_prediksi_b ? 'SANGAT BAIK' : 'BAIK'),
				];
				$this->db->insert('hasil',$insert);

				$this->session->set_flashdata('success', ($nilai_prediksi_sb > $nilai_prediksi_b ? 'SANGAT BAIK' : 'BAIK'));
				redirect($_SERVER['HTTP_REFERER']);
			}

       public function excel()
    {
        // echo "<pre>"; var_dump($_FILES); echo "</pre>"; die();
        if(isset($_FILES["file_uji"]["name"])){
              // upload
            $file_tmp = $_FILES['file_uji']['tmp_name'];
            $file_name = $_FILES['file_uji']['name'];
            $file_size =$_FILES['file_uji']['size'];
            $file_type=$_FILES['file_uji']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            
            // echo "<pre>"; var_dump(
        //     $standar_deviasi_pengetahuansb, $standar_deviasi_pengetahuanb,
        //     $standar_deviasi_ketrampilansb, $standar_deviasi_ketrampilanb
        // ); echo "</pre>"; die();
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=4; $row<=$highestRow; $row++){
    
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
    
            $this->db->insert_batch('uji_akurasi', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('guru/Uji_akurasi');
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
        $uji_akurasi = $this->model_ujiakurasi;
        $validation = $this->form_validation;
        $validation->set_rules($uji_akurasi->rules());

        if ($validation->run()) {
            $uji_akurasi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("guru/akurasi_new");
    }

    //mengedit data ke database
    public function edit($id_uji = null)
    {
        if (!isset($id_uji)) redirect('guru/uji_akurasi');
       
        $uji_akurasi = $this->model_ujiakurasi;
        $validation = $this->form_validation;
        $validation->set_rules($uji_akurasi->rules());

        if ($validation->run()) {
            $uji_akurasi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["uji_akurasi"] = $uji_akurasi->getById($id_uji);
        if (!$data["uji_akurasi"]) show_404();
        
        $this->load->view("guru/uji_akurasi", $data);
    }  
   
    //menghapus data di database
    public function delete()
    {
        if ($this->db->empty_table('hasil')) {
            $this->db->empty_table('akurasi');
            redirect(site_url('guru/uji_akurasi'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }


}

