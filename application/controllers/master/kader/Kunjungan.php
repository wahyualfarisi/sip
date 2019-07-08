<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table        = 't_kunjungan';
    $this->primary      = 'no_kunjungan';
    $this->foreignKEY_1 = 'id_kegiatan';
    $this->foreignKEY_2 = 'no_kms';
    $this->load->model('m_core');
    $this->load->model('m_kunjungan');
    $this->load->model('m_kms');
  }

  public function fetch_list_kms()
  {
      $query = '';
      if($this->input->post('query') ){
        $query = $this->input->post('query');
      }

      $data = $this->m_kms->fetch_kms($query);
      echo json_encode($data->result());
  }

  public function fetch_jadwal_kegiatan()
  {
      $data = $this->m_kunjungan->fetch_jadwal_kegiatan();
      echo json_encode($data->result() );
  }

  public function addAntrian()
  {
    $targetID    = $this->input->post('targetID');
    $no_kegiatan = $this->input->post('no_kegiatan');

    $where_antri = array(
      'id_kegiatan' => $no_kegiatan
    );

    $check_nokms = $this->m_core->get_where($this->table, array($this->foreignKEY_2 => $targetID ) );

    $no_antri    = $this->m_core->get_where($this->table, $where_antri )->num_rows() + 1;


    if($check_nokms->num_rows() > 0) {
      $res = array('msg' => 'No. '.$targetID.' Sudah Dalam Antrian ', 'code' => 400  );
      echo json_encode($res);
      return;
    }

    $data_insert = array(
      'no_kunjungan' => $this->generateAutoNumber(),
      'no_kms' => $targetID,
      'id_kegiatan' => $no_kegiatan,
      'no_antri' => $no_antri,
      'tanggal_kunjungan' => date('Y-m-d'),
      'status' => 'proses'
    );

    $insertAntri = $this->m_core->add_data($this->table, $data_insert);
    if($insertAntri){
      $res = array('msg' => 'Berhasil Menambahkan Ke Antrian ', 'code' => 200 );
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Menambahkan Ke Antrian', 'code' => 400 );
      echo json_encode($res);
    }


  }


  public function generateAutoNumber()
  {
    $data = $this->m_core->getMaxNumber($this->table, $this->primary);
    $kode = $data->result()[0]->maxKode;
    $nourut = (int) substr($kode, 4, 4);
    $nourut++;


    $char = 'KJG_';
    $newID = $char. sprintf('%04s', $nourut);
    return $newID;
  }

}