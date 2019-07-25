<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->t_kunjungan       = 't_kunjungan';
    $this->t_warga           = 't_warga';
    $this->t_anak            = 't_anak';
    $this->t_kms             = 't_kms';
    $this->t_jadwal_kegiatan = 't_jadwal_kegiatan';
    $this->t_pertumbuhan     = 't_cek_pertumbuhan';
    $this->t_imunisasi       = 't_cek_imunisasi';
    $this->load->model('m_core');
    $this->load->model('m_laporan');
  }


  function create_laporan()
  {
      $jenis_laporan = $this->input->post('jenis_laporan');
      $dari_tgl      = $this->input->post('dari_tgl');
      $sampai_tgl    = $this->input->post('sampai_tgl');

      $create_laporan_imunisasi   = $this->m_laporan->create_report_imunisasi($dari_tgl, $sampai_tgl);
      $create_laporan_pertumbuhan = $this->m_laporan->create_report_pertumbuhan($dari_tgl,$sampai_tgl );

      if($jenis_laporan == 'imunisasi'){
          echo json_encode($create_laporan_imunisasi->result() );
      }else if($jenis_laporan == 'pertumbuhan'){
          echo json_encode($create_laporan_pertumbuhan->result() );
      }else{
          echo json_encode(array(
            'msg' => 'No Data',
            'code' => 404
          ));
      }
  }

}