<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table   = 't_panitia';
    $this->primary = 'kode_panitia';
    $this->load->model('m_core');
  }

  function getuser()
  {
    $data = $this->m_core->get_all($this->table)->result();
    echo json_encode($data);
  }

  function deleteUser()
  {
    $targetID = $this->input->post('targetID');
    $where = array(
      $this->primary => $targetID
    );
    $delete = $this->m_core->delete_rows($this->table, $where);
    if($delete){
      $res = array('msg' => 'Data user berhasil di hapus', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal menghapus data', 'code' => 400);
      echo json_encode($res);
    }
  }

  function adduser()
  {
    $data = array(
      'kode_panitia' => $this->input->post('kode_panitia'),
      'nama_panitia' => $this->input->post('nama_panitia'),
      'password' => $this->input->post('password'),
      'akses' => $this->input->post('akses')
    );
    $insert = $this->m_core->add_data($this->table, $data);
    if($insert){
      $res = array('msg' => 'berhasil menambahkan user', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal menambahkan data', 'code' => 400);
      echo json_encode($res);
    }
  }

  function fetch_user($id)
  {
    $where = array($this->primary => $id);
    $data  = $this->m_core->get_where($this->table, $where)->result();
    echo json_encode($data);
  }

}
