<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_warga';
    $this->load->model('m_core');
  }

  function addData()
  {
    $no_kk = $this->input->post('no_kk');
    $dataWarga = array(
      'no_kk'      => $no_kk,
      'nama_ayah'  => $this->input->post('nama_ayah'),
      'nama_ibu'   => $this->input->post('nama_ibu'),
      'password'   => '1234',
      'pekerjaan'  => $this->input->post('pekerjaan'),
      'agama'      => $this->input->post('agama'),
      'alamat'     => $this->input->post('alamat'),
      'no_telp'    => $this->input->post('no_telp'),
      'tanggal_terdaftar' => date('Y-m-d')
    );
    $no_bpjs     = $this->input->post('no_bpjs');
    $nama_depan  = $this->input->post('nama_depan');
    $nama_blkg   = $this->input->post('nama_blkg');
    $umur        = $this->input->post('umur');
    $jk          = $this->input->post('jk');

    $insert = $this->m_core->add_data($this->table, $dataWarga);
    if($insert){
      if(count($no_bpjs) > 0){
        for($count = 0; $count<count($no_bpjs); $count++)
          {
            $data = array(
              'no_bpjs'       => $no_bpjs[$count],
              'no_kk'         => $no_kk,
              'nama_depan'    => $nama_depan[$count],
              'nama_belakang' => $nama_blkg[$count],
              'umur'          => $umur[$count],
              'jenis_kelamin' => $jk[$count]
            );
             $this->db->insert('t_anak', $data);
          }
         echo json_encode(array('msg' => 'success'));
      }else{
        echo json_encode(array('msg' => 'success'));
      }
    }else{
      echo json_encode(array('msg' => 'failed') );
    }
  }

}
