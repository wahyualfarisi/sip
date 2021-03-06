<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('akses') != 'kader' || $this->session->userdata('login') !== 1 ){
      redirect('/Login');
    }
    $this->load->model('m_kunjungan');
    $this->load->model('m_core');
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

  function listanak()
  {
    $this->load->view('kader/pages/v_anak');
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
    $check_kegiatan_today = $this->m_kunjungan->fetch_jadwal_kegiatan();
    if($check_kegiatan_today->num_rows() === 1){
      $data['kegiatan'] = $check_kegiatan_today;
      $this->load->view('kader/pages/v_kunjungan', $data);
    }else{
      $this->load->view('kader/pages/v_empty_activity');
    }
   
  }

  function kms()
  {
    $this->load->view('kader/pages/v_kms');
  }

  function jadwalkegiatan()
  {
    $this->load->view('kader/pages/v_jadwal_kegiatan');
  }

  function wargadetail($id)
  {
    $cheknik = $this->m_core->get_where('t_warga', array('no_kk' => $id) );
    if($cheknik->num_rows() > 0){
      $this->load->view('kader/pages/v_detail_warga');
    }else{
      echo "No. KK Tidak Tersedia";
    }
    
  }

  function addkegiatan()
  {
    $this->load->view('kader/form/form_add_kegiatan');
  }

  function tumbuhanak()
  {
    $this->load->view('kader/pages/v_tumbuh_anak');
  }

  function imunisasi()
  {
    $this->load->view('kader/pages/v_imunisasi');
  }

  function datakunjungan()
  {
    $data['jadwal'] = $this->m_core->get_all('t_jadwal_kegiatan');
    $this->load->view('kader/pages/v_datakunjungan', $data);
  }

  function detailkms()
  {
    $this->load->view('kader/pages/v_detail_kms');
  }

}
