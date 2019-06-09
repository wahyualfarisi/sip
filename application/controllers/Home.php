<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('warga/root');
  }

  function dashboard()
  {
    $this->load->view('warga/pages/v_welcome');
  }

  function login()
  {
    if($this->session->userdata('login') != 1){
      $this->load->view('warga/pages/v_login');
    }
    
  }

  function register()
  {
    if($this->session->userdata('login') != 1){
      $this->load->view('warga/pages/v_register');
    }
    
  }

  function jadwal()
  {
    $this->load->view('warga/pages/v_jadwal_kegiatan');
  }

  function antrian()
  {
    $this->load->view('warga/pages/v_antrian');
  }

}
