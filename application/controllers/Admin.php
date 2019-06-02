<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->t_panitia = 't_panitia';
    $this->load->model('m_core');
    if($this->session->userdata('akses') != 'admin' ||
       $this->session->userdata('akses') == 'kader' ||
       $this->session->userdata('akses') == 'ketua' ||
       $this->session->userdata('login') !== 1 ){
      redirect('/Login');
    }
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

  function adduser()
  {
    $this->load->view('admin/form/form_add_user');
  }

  function edituser($id)
  {
    $this->load->view('admin/form/form_edit_user');
  }

}
