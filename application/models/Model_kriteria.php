<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kriteria extends CI_Model
{
	private $_table = "kriteria"; //nama tabel

	//nama kolom di tabel
	public $id_kriteria;
    public $kode_kriteria;
	public $nama_kriteria;
	
	public function rules ()
	{
		 return [
             ['field' => 'kode_kriteria',
            'label' => 'Kode_kriteria',
            'rules' => 'required'],

            ['field' => 'nama_kriteria',
            'label' => 'nama_kriteria',
            'rules' => 'required'],
        ];
	}
	 //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id');
    }

    //fungsi check username & password login
    function check_login($table, $field1, $field2)
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

    //get all data siswa
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    //fungsi edit
    public function getById($id_kriteria)
    {
        return $this->db->get_where($this->_table, ["id_kriteria" => $id_kriteria])->row();
    }
    public function save()
    {
        $post = $this->input->post(); //ambil data dari form
        $this->id_kriteria = uniqid();
        $this->kode_kriteria = $post["kode_kriteria"];
        $this->nama_kriteria = $post["nama_kriteria"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kriteria = $post["id_kriteria"];
        $this->kode_kriteria = $post["kode_kriteria"];
        $this->nama_kriteria = $post["nama_kriteria"];
        return $this->db->update($this->_table, $this, array('id_kriteria' => $post['id_kriteria']));
    }

    public function delete($id_kriteria)
    {
        return $this->db->delete($this->_table, array("id_kriteria" => $id_kriteria));
    }
}
