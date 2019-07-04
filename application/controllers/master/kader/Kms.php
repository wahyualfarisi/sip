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
  }

  public function add()
  {
      $data = array(
        'no_kms' => rand(0, 300),
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
      }
 
  }

}