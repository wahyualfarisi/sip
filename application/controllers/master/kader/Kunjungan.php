<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_kunjungan';
    $this->primary = 'no_kunjungan';
    $this->foreignKEY_1 = 'id_kegiatan';
    $this->foreignKEY_2 = 'no_kms';
    $this->load->model('m_core');
    $this->load->model('m_kunjungan');
  }

  public function fetch_list_kms()
  {
      $data = $this->m_kunjungan->fetch_list_kms();
      echo json_encode($data->result());

  }

  public function fetch_jadwal_kegiatan()
  {
      $data = $this->m_kunjungan->fetch_jadwal_kegiatan();
      echo json_encode($data->result() );
  }

}