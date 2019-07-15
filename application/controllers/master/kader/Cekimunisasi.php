<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekimunisasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_cek_imunisasi';
    $this->primary = 'no_cek_imunisasi';
    $this->load->model('m_core');
    $this->load->model('m_imunisasi');    
  }

  public function add()
  {
    $no_kunjungan = $this->input->post('no_kunjungan');
    $data = array(
      'no_cek_imunisasi' => $this->generateAutoNumber(),
      'id_imunisasi' => $this->input->post('imunisasi'),
      'no_kunjungan' => $no_kunjungan,
      'umur' => $this->input->post('umur'),
      'tgl_cek_imunisasi' => date('Y-m-d'),
      'catatan' => $this->input->post('catatan'),
      'kode_panitia' => $this->session->userdata('kode_panitia')
    );
    
    $insert = $this->m_core->add_data($this->table, $data);
    if($insert){
      $update = $this->m_core->update_table('t_kunjungan', array('status' => 'selesai'), array('no_kunjungan' => $no_kunjungan) );
      $res = array(
        'msg' => 'Data Imunisasi Berhasil Di Simpan',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Data Imunisasi Gagal Disimpan',
        'code' => 400
      );
      echo json_encode($res);
    }


  }

  public function getimunisasi()
  {
      $query = "";
      if($this->input->post('query') ){
        $query = $this->input->post('query');
      } 
      $data = $this->m_imunisasi->get_imunisasi_kunjungan($query);
      echo json_encode($data->result() );
  }

  public function cek_imunisasi()
  {
      $kms  = $this->input->post('no_kms');
      $umur = $this->input->post("umur");
      $imunisasi = [];
      $data = $this->m_imunisasi->get_imunisasi($kms);

      foreach($data->result() as $row_imunisasi){
         array_push($imunisasi, $row_imunisasi->id_imunisasi);
      }

      $show_imunisasi = $this->m_imunisasi->show_imunisasi($imunisasi, $umur);
      echo json_encode($show_imunisasi->result() );
  }

  public function generateAutoNumber()
  {
      $data   = $this->m_core->getMaxNumber($this->table, $this->primary);
      $kode   = $data->result()[0]->maxKode;
      $nourut = (int) substr($kode, 4, 4);
      $nourut++;

      $char   = 'CEK_';
      $newID  = $char. sprintf('%04s', $nourut);
      return $newID;
  }

}