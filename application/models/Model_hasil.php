<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_hasil extends CI_Model
{
	private $_table = "hasil"; //nama tabel

	//nama kolom di tabel
	public $id_hasil;
    public $nama_siswa;
    public $jenkel;
    public $pengetahuan;
    public $ketrampilan;
    public $spiritual;
    public $sosial;
    public $predikat_asli;
    public $predikat_hasil;
    public $nilai_sangatbaik;
    public $nilai_baik;

    //cek validasi
    public function rules()
    {
        return [

            ['field' => 'nama_siswa',
            'label' => 'Nama_siswa',
            'rules' => 'required'],

            ['field' => 'jenkel',
            'label' => 'Jenkel',
            'rules' => 'required'],

            ['fiels' => 'pengetahuan',
            'label' => 'Pengetahuan',
            'rules' => 'required'],

            ['field' => 'ketrampilan',
            'label' => 'Ketrampilan',
            'rules' => 'required'],

            ['field' => 'spiritual',
            'label' => 'Spiritual',
            'rules' => 'required'],

            ['field' => 'sosial',
            'label' => 'Sosial',
            'rules' => 'required'],

            ['field' => 'predikat_asli',
            'label' => 'Predikat_asli',
            'rules' => 'required'],

            ['field' => 'predikat_hasil',
            'label' => 'Predikat_hasil',
            'rules' => 'required'],

            ['field' => 'nilai_sangatbaik',
            'label' => 'Nilai_sangatbaik',
            'rules' => 'required'],

            ['field' => 'nilai_baik',
            'label' => 'Nilai_baik',
            'rules' => 'required'],
        ];
    }
    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id');
    }

    //fungsi check username & password login
    function check_login($table, $field1, $field2, $field3, $field4, $field5,$field6,$field7, $field8, $field9, $field10, $field11)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);
        $this->db->where($field4);
        $this->db->where($field5);
        $this->db->where($field6);
        $this->db->where($field7);
        $this->db->where($field8);
        $this->db->where($field9);
        $this->db->where($field10);
        $this->db->where($field11);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

	public function getAll() //metho get untuk mengambil data dari database
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_hasil)
    {
        return $this->db->get_where($this->_table, ["id_hasil" => $id_hasil])->row();
    }

    public function save()
    {
        $post = $this->input->post(); //ambil data dari form
        $this->id_hasil = uniqid();
        $this->nama_siswa = $post["nama_siswa"];
        $this->jenkel = $post["jenkel"];
        $this->pengetahuan = $post["pengetahuan"];
        $this->ketrampilan = $post["ketrampilan"];
        $this->spiritual = $post["spiritual"];
        $this->sosial = $post["sosial"];
        $this->predikat_asli = $post["predikat_asli"];
        $this->predikat_hasil = $post["predikat_hasil"];
        $this->nilai_sangatbaik = $post["nilai_sangatbaik"];
        $this->nilai_baik = $post["nilai_baik"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_hasil = $post["id_hasil"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->jenkel = $post["jenkel"];
        $this->pengetahuan = $post["pengetahuan"];
        $this->ketrampilan = $post["ketrampilan"];
        $this->spiritual = $post["spiritual"];
        $this->sosial = $post["sosial"];
        $this->predikat_asli = $post["predikat_asli"];
        $this->predikat_hasil = $post["predikat_hasil"];
        $this->nilai_sangatbaik = $post["nilai_sangatbaik"];
        $this->nilai_baik = $post["nilai_baik"];
        return $this->db->update($this->_table, $this, array('id_hasil' => $post['id_hasil']));
    }

    public function delete($id_hasil)
    {
        return $this->db->delete($this->_table, array("id_hasil" => $id_hasil));
    }
}
