<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dataadmin extends CI_Model
{
    private $_table = "user";
    public $id_user;
    public $nama;
    public $username;
    public $password;
    public $level;

    //cek validasi
    public function rules()
    {
        return [

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'level',
            'label' => 'Level',
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

    //get all data user
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    //fungsi edit
    public function getById($id_user)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id_user])->row();
    }

    //ngesave inputan new ke database
    public function save()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = md5($_POST['password']);
        $this->level= $post["level"];
          
        $this->db->insert($this->_table, $this);
    }

    //ngeupdate inputan edit ke database
    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = md5($_POST['password']);
         $this->level = $post["level"];
        
        $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }
    
    //hapus data database
    public function delete($id_user)
    {
      return $this->db->delete($this->_table, array("id_user" => $id_user));
    }

}
