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
    // $kode_panitia = $this->input->post('kode_panitia');
    // $check_kode_panitia = $this->m_core->get_where($this->table, array($this->primary => $kode_panitia) );

    // if($check_kode_panitia->num_rows() > 0) {
    //   $res = array('msg' => 'kode panitia sudah ada , silahkan gunakan kode lain', 'code' => 500);
    //   echo json_encode($res);
    //   return;
    // }


    $data = array(
      'kode_panitia' => $this->generateAutoNumber(),
      'username'     => $this->input->post('username'),
      'nama_panitia' => $this->input->post('nama_panitia'),
      'password'     => $this->input->post('password'),
      'akses'        => $this->input->post('akses')
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

  function update()
  {
    $data = array(
      'username'     => $this->input->post('username_edit'),
      'nama_panitia' => $this->input->post('nama_panitia_edit'),
      'akses'        => $this->input->post('akses_edit')
    );

    $where = array('kode_panitia' => $this->input->post('kode_panitia_edit') );

    $update = $this->m_core->update_table($this->table,$data,$where);
    if($update){
      $res = array('msg' => 'Berhasil Update data user', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Update data user', 'code' => 400);
      echo json_encode($res);
    }
  }

  function fetch_user($id)
  {
    $where = array($this->primary => $id);
    $data  = $this->m_core->get_where($this->table, $where)->result();
    echo json_encode($data);
  }

  function generateAutoNumber()
  {
    $data = $this->m_core->getMaxNumber($this->table, $this->primary);
    $kode = $data->result()[0]->maxKode;
    $nourut = (int) substr($kode, 5, 5);
    $nourut++;

    $char = 'slipi';
    $newID = $char. sprintf('%04s', $nourut);
    return $newID;
  }

}
