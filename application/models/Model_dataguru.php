<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dataguru extends CI_Model
{
    private $_table = "guru";
    public $id_guru;
    public $nik;
    public $nama_guru;
    public $email_guru;
    public $jabatan;

    //cek validasi
    public function rules()
    {
        return [

            ['field' => 'nik',
            'label' => 'Nik',
            'rules' => 'required'],

            ['field' => 'nama_guru',
            'label' => 'Nama_guru',
            'rules' => 'required'],

            ['field' => 'email_guru',
            'label' => 'email_guru',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'jabatan',
            'rules' => 'required']
        ];
    }

    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id_admin');
    }

    //fungsi check username & password login
    function check_login($table, $field1, $field2, $field3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);

        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //get all data guru
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    //fungsi edit
    public function getById($id_guru)
    {
        return $this->db->get_where($this->_table, ["id_guru" => $id_guru])->row();
    }

    //ngesave inputan new ke database
    public function save()
    {
        $post = $this->input->post();
        $this->id_guru = $post["id_guru"];
        $this->nik = $post["nik"];
        $this->nama_guru = $post["nama_guru"];
        $this->email_guru = $post["email_guru"];
        $this->jabatan = $post["jabatan"];
          // $password = md5($this->input->post('password'));

        $this->db->insert($this->_table, $this);
    }

    //ngeupdate inputan edit ke database
    public function update()
    {
        $post = $this->input->post();
        $this->id_guru = $post["id_guru"];
        $this->nik = $post["nik"];
        $this->nama_guru = $post["nama_guru"];
        $this->email_guru = md5($_POST['email_guru']);
        $this->jabatan = $post["jabatan"];
        
        $this->db->update($this->_table, $this, array('id_guru' => $post['id_guru']));
    }
    
    //hapus data database
    public function delete($id_guru)
    {
      return $this->db->delete($this->_table, array("id_guru" => $id_guru));
    }

}
