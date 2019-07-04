<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_anak';
    $this->load->model('m_core');
    $this->load->model('m_warga');    
  }

  function add()
  {
    $data = array(
      'no_bpjs' => $this->input->post('no_bpjs'),
      'no_kk' => $this->input->post('no_kk'),
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin')
    );
    $check_primary = $this->m_core->get_where($this->table, array('no_bpjs' => $this->input->post('no_bpjs')));
    if($check_primary->num_rows() > 0){
      $res = array('msg' => 'No Bpjs Sudah Ada', 'code' => 500);
      echo json_encode($res);
      return;
    }


    $insert = $this->m_core->add_data($this->table,$data);
    if($insert){
      $res = array('msg' => 'Berhasil menambahkan Anak', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Menambahkan Anak', 'code' => 400);
      echo json_encode($res);
    }
  }

  function delete()
  {
    $id_target = $this->input->post('targetID');
    $delete = $this->m_core->delete_rows($this->table, array('no_bpjs' => $id_target) );
    if($delete){
      $res = array('msg' => 'Berhasil menghapus data anak', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal menghapus data anak', 'code' => 400);
      echo json_encode($res);
    }
  }

  function update()
  {
    $data = array(
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin')
    );
    $where = array(
      'no_bpjs' => $this->input->post('no_bpjs')
    );

    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array('msg' => 'Berhasil update data anak ', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Update Data Anak', 'code' => 500);
      echo json_encode($res);
    }
  }

  function fetch_anak_json()
  {
    $query = '';
    if($this->input->post('query') ){
      $query = $this->input->post('query');
    }

    $data = $this->m_warga->fetch_anak_warga($query);
    echo json_encode($data->result() );

  }


  

}
