<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_datasiswa extends CI_Model
{
    private $_table = "datasiswa";
    public $id_datasiswa;
    public $nisn;
    public $nama_siswa;
    public $ttl;
    public $jenkel;
    public $agama;
    public $alamat;

    //cek validasi
    public function rules()
    {
        return [

            ['field' => 'nisn',
            'label' => 'Nisn',
            'rules' => 'required'],

            ['field' => 'nama_siswa',
            'label' => 'Nama_siswa',
            'rules' => 'required'],

            ['field' => 'ttl',
            'label' => 'Ttl',
            'rules' => 'required'],

            ['field' => 'jenkel',
            'label' => 'Jenkel',
            'rules' => 'required'],

            ['field' => 'agama',
            'label' => 'Agama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

        ];
    }

    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id_admin');
    }

    //fungsi check username & password login
    function check_login($table, $field1, $field2, $field3, $field4, $field5,$field6)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);
        $this->db->where($field4);
        $this->db->where($field5);
        $this->db->where($field6);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //get all data siswa
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    //fungsi edit
    public function getById($id_datasiswa)
    {
        return $this->db->get_where($this->_table, ["id_datasiswa" => $id_datasiswa])->row();
    }

    //ngesave inputan new ke database
    public function save()
    {
        $post = $this->input->post();
        $this->id_datasiswa = $post["id_datasiswa"];
        $this->nisn = $post["nisn"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->ttl = $post["ttl"];
        $this->jenkel = $post["jenkel"];
        $this->agama = $post["agama"];
        $this->alamat = $post["alamat"];
      
        $this->db->insert($this->_table, $this);
    }

    //ngeupdate inputan edit ke database
    public function update()
    {
        $post = $this->input->post();
        $this->id_datasiswa = $post["id_datasiswa"];
        $this->nisn = $post["nisn"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->ttl = $_post['ttl'];
        $this->jenkel = $_post['jenkel'];
        $this->agama = $_post['agama'];
        $this->alamat = $_post['alamat'];
 
        $this->db->update($this->_table, $this, array('id_datasiswa' => $post['id_datasiswa']));
    }
    
    //hapus data database
    public function delete($id_datasiswa)
    {
      return $this->db->delete($this->_table, array("id_datasiswa" => $id_datasiswa));
    }

}
