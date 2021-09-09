<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
          $this->load->view('dashboard_view');
      }else{
          echo "Access Denied";
      }
 
  }
  function guru(){
    //Allowing akses to guru only
    if($this->session->userdata('level')==='2'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }
}