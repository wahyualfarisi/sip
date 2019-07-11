<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->t_kunjungan       = 't_kunjungan';
    $this->t_warga           = 't_warga';
    $this->t_anak            = 't_anak';
    $this->t_kms             = 't_kms';
    $this->t_jadwal_kegiatan = 't_jadwal_kegiatan';
    $this->load->model('m_core');
    $this->load->model('m_dashboard');
  }

  public function fetch_total()
  {
    $kunjungan = $this->m_core->get_all($this->t_kunjungan)->num_rows();
    $warga     = $this->m_core->get_all($this->t_warga)->num_rows();
    $kms       = $this->m_core->get_all($this->t_kms)->num_rows();
    $jadwal    = $this->m_core->get_all($this->t_jadwal_kegiatan)->num_rows();

    $res['kunjungan'] = $kunjungan;
    $res['warga']     = $warga;
    $res['kms']       = $kms;
    $res['jadwal']    = $jadwal;

    echo json_encode($res);

  }

  public function fetch_detail_kunjungan()
  {
    $data_kunjungan = $this->m_dashboard->get_detail_kunjungan('20190709-141');
    $data_anak      = $this->m_core->get_all($this->t_anak);
    $store = [];

    $json[] = array(
      'data_kunjungan' => $data_kunjungan->result() ,
      'jumlah_anak'    => $data_anak->num_rows()
    );
    echo json_encode($json);

  }



}