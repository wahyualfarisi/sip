<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kms extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_kms';
    $this->primary = 'no_kms';
    $this->foreignKEY = 'no_bpjs';
    $this->load->model('m_core');
    $this->load->model('m_kms');
  }



  public function add()
  {
      $data = array(
        'no_kms' => $this->generateAutoNumber(),
        'no_bpjs' => $this->input->post('no_bpjs'),
        'tanggal_terdaftar' => date('Y-m-d'),
        'berat_badan_lahir' => $this->input->post('berat_badan'),
        'panjang_badan_lahir' => $this->input->post('panjang_badan')
      );

      $check_no_bpjs = $this->m_core->get_where($this->table, array('no_bpjs' => $this->input->post('no_bpjs')));
      if($check_no_bpjs->num_rows() > 0) {
          $res = array('msg' => 'No. BPJS Sudah Di gunakan dalam KMS', 'code' => 400);
          echo json_encode($res);
          return;
      }


      $insert = $this->m_core->add_data($this->table, $data);
      if($insert){
          $res = array(
            'msg' => 'KMS Berhasil Di Buat',
            'code' => 200
          );
          echo json_encode($res);
      }else{
          $res = array(
            'msg' => 'KMS Gagal Di Buat',
            'code' => 500
          );
          echo json_encode($res);
      }
  }

  public function fetch()
  {
    $query = '';
    if($this->input->post('query') ){
      $query = $this->input->post('query');
    }
    $data = $this->m_kms->fetch_kms($query);
    echo json_encode($data->result() );
  }

  public function delete()
  {
    $no_kms = $this->input->post('no_kms');
    
    $where[$this->primary] = $no_kms;

    $delete = $this->m_core->delete_rows($this->table, $where);
    if($delete){
      $res = array('msg' => 'KMS Berhasil Di Hapus', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'KMS Gagal Di Hapus', 'code' => 400);
      echo json_encode($res);
    }

  }

  public function generateAutoNumber()
  {
    $data = $this->m_core->getMaxNumber($this->table, $this->primary);
    $kode = $data->result()[0]->maxKode;
    $nourut = (int) substr($kode, 4, 4);
    $nourut++;


    $char = 'kms_';
    $newID = $char. sprintf('%04s', $nourut);
    return $newID;
  }

  

 

}