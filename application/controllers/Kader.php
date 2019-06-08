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

  function listwarga()
  {
    $this->load->view('kader/pages/v_warga');
  }

  function addwarga()
  {
    $this->load->view('kader/form/form_add_warga');
  }

  function addkunjungan()
  {
    $this->load->view('kader/form/form_add_kunjungan');
  }

  function kunjungan()
  {
    $this->load->view('kader/pages/v_kunjungan');
  }

  function kms()
  {
    $this->load->view('kader/pages/v_kms');
  }

  function jadwalkegiatan()
  {
    $this->load->view('kader/pages/v_jadwal_kegiatan');
  }

  function wargadetail($id = null)
  {
    $this->load->view('kader/pages/v_detail');
  }

  function addkegiatan()
  {
    $this->load->view('kader/form/form_add_kegiatan');
  }

}
