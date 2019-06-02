<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('akses') != 'kader' || $this->session->userdata('login') !== 1 ){
      redirect('/Login');
    }
  }

  function index()
  {
    $this->load->view('kader/root');
  }

  function dashboard()
  {
    $this->load->view('kader/pages/v_dashboard');
  }

}
