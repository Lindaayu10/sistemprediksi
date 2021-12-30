<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_datatesting extends CI_Model
{
	private $_table = "datatesting"; //nama tabel

	//nama kolom di tabel
	public $id_datatesting;
	public $nama_siswa;
	public $jenkel;
	public $pengetahuan;
	public $ketrampilan;
	public $spiritual;
	public $sosial;
	public $predikat_asli;

	//cek validasi
	public function rules()
	{
		return [

			[
				'field' => 'id_datatesting',
				'label' => 'Id_datatesting',
				'rules' => 'required'
			],

			[
				'field' => 'nama_siswa',
				'label' => 'Nama_siswa',
				'rules' => 'required'
			],

			[
				'field' => 'jenkel',
				'label' => 'Jenkel',
				'rules' => 'required'
			],

			[
				'fiels' => 'pengetahuan',
				'label' => 'Pengetahuan',
				'rules' => 'required'
			],

			[
				'field' => 'ketrampilan',
				'label' => 'Ketrampilan',
				'rules' => 'required'
			],

			[
				'field' => 'spiritual',
				'label' => 'Spiritual',
				'rules' => 'required'
			],

			[
				'field' => 'sosial',
				'label' => 'Sosial',
				'rules' => 'required'
			],

			[
				'field' => 'predikat_asli',
				'label' => 'Predikat',
				'rules' => 'required'
			],

		];
	}
	//fungsi cek session
	function logged_id()
	{
		return $this->session->userdata('id');
	}

	//fungsi check username & password login
	function check_login($table, $field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8)
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

	public function getById($id_datatesting)
	{
		return $this->db->get_where($this->_table, ["id_datatesting" => $id_datatesting])->row();
	}

	public function save()
	{
		$post = $this->input->post(); //ambil data dari form
		$this->id_datatesting = uniqid();
		$this->nama_siswa = $post["nama_siswa"];
		$this->jenkel = $post["jenkel"];
		$this->pengetahuan = $post["pengetahuan"];
		$this->ketrampilan = $post["ketrampilan"];
		$this->spiritual = $post["spiritual"];
		$this->sosial = $post["sosial"];
		$this->predikat_asli = $post["predikat_asli"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_datatesting = $post["id_datatesting"];
		$this->nama_siswa = $post["nama_siswa"];
		$this->jenkel = $post["jenkel"];
		$this->pengetahuan = $post["pengetahuan"];
		$this->ketrampilan = $post["ketrampilan"];
		$this->spiritual = $post["spiritual"];
		$this->sosial = $post["sosial"];
		$this->predikat_asli = $post["predikat_asli"];
		return $this->db->update($this->_table, $this, array('id_datatesting' => $post['id_datatesting']));
	}

	public function delete($id_datatesting)
	{
		return $this->db->delete($this->_table, array("id_datatesting" => $id_datatesting));
	}

	public function count()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		return $this->db->get()->num_rows();
	}
}
