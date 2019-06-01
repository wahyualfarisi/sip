<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('admin/root');
  }

  function dashboard()
  {
    $this->load->view('admin/pages/v_dashboard');
  }

  function user()
  {
    $this->load->view('admin/pages/v_users');
  }

  function imunisasi()
  {
    $this->load->view('admin/pages/v_imunisasi');
  }

}
