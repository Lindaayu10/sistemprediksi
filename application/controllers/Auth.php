<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
  }
  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('admin/dashboard'); // Redirect ke page home
    // function render_login tersebut dari file core/MY_Controller.php
    $this->render_login('login'); // Load view login.php
  }
  public function login(){
    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->User_model->get('user'); // Panggil fungsi get yang ada di User_model.php
    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
      redirect('login'); // Redirect ke halaman login
    }else{
      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'username'=>$user->username,  // Buat session username
          'password'=>$user->password, // Buat session password
          'level'=>$user->level // Buat session level
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('admin/dashboard'); // Redirect ke halaman home
      }else{
        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
        redirect('login'); // Redirect ke halaman login
      }
    }
  }
  public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
  }
}
