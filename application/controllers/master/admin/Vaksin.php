<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaksin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_imunisasi';
    $this->primary = 'id_imunisasi';
    $this->load->model('m_core');
  }

  function addvaksin()
  {
    $data = array(
      'nama_imunisasi' => $this->input->post('nama_imunisasi'),
      'dari_usia' => $this->input->post('dari_usia'),
      'sampai_usia' => $this->input->post('sampai_usia'),
      'catatan' => $this->input->post('catatan')
    );

    $insert = $this->m_core->add_data($this->table, $data);
    if($insert){
      $res = array('msg' => 'Berhasil menambahkan vaksin', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal menambahkan Vaksin', 'code' => 400);
      echo json_encode($res);
    }
  }

  function getAll()
  {
    $data = $this->m_core->get_all($this->table)->result();
    echo json_encode($data);
  }

  function deletevaksin()
  {
    $targetID = $this->input->post('targetID');

    $where = array($this->primary => $targetID);

    $delete   = $this->m_core->delete_rows($this->table, $where);
    if($delete){
      $res = array('msg' => 'Vaksin berhasil di hapus', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Vaksin gagal di hapus', 'code' => 400);
      echo json_encode($res);
    }
  }

  function updatevaksin()
  {
    $data = array(
      'nama_imunisasi' => $this->input->post('nama_imunisasi'),
      'dari_usia' => $this->input->post('dari_usia'),
      'sampai_usia' => $this->input->post('sampai_usia'),
      'catatan' => $this->input->post('catatan')
    );

    $where = array(
      'id_imunisasi' => $this->input->post('id_imunisasi')
    );

    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array('msg' => 'Data Vaksin berhasil di update', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Data Gagal di update', 'code' => 400);
      echo json_encode($res);
    }
  }


}
