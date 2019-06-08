<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('login') !== 1 ){
      redirect('/Login');
    }
  }

  function index()
  {
    $this->load->view('ketua/root');
  }

  function dashboard()
  {
    $this->load->view('ketua/pages/v_dashboard');
  }

}
