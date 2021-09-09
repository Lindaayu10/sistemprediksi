<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('auth/registration');
        $this->load->view('layouts/footer');
    }
}
