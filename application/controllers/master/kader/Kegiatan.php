<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_jadwal_kegiatan';
    $this->primary = 'no_kegiatan';
    $this->load->model('m_core');
    //Codeigniter : Write Less Do More
  }

  function fetch()
  {
    $data = $this->m_core->get_all($this->table);
    echo json_encode($data->result());
  }

  function add()
  {
    $tgl_kegiatan = $this->input->post('tanggal_kegiatan');
    $dataChange   = date('Ymd', strtotime($tgl_kegiatan) );

    $data = array(
      'no_kegiatan' => $dataChange.'-'.rand(0,200),
      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
      'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
      'lokasi' => $this->input->post('lokasi'),
      'kode_panitia' => $this->session->userdata('kode_panitia')
    );

    $insert = $this->m_core->add_data($this->table, $data);
    if($insert){
      $res = array('msg' => 'Berhasil menambahkan kegiatan', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Menambahkan kegiatan', 'code' => 400);
      echo json_encode($res);
    }
  }

  function delete()
  {
    $where = array(
      'no_kegiatan' => $this->input->post('targetID')
    );
    $delete = $this->m_core->delete_rows($this->table, $where);
    if($delete){
      $res = array('msg' => 'Berhasil Menghapus data kegiatan', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Menghapus data kegiatan', 'code' => 400);
      echo json_encode($res);
    }
  }

  function update()
  {
    $where = array(
      'no_kegiatan' => $this->input->post('no_kegiatan')
    );

    $data = array(
      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
      'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
      'lokasi' => $this->input->post('lokasi')
    );

    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array('msg' => 'Berhasil update data kegiatan','code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Gagal Update Data Kegiatan', 'code' => 200);
      echo json_encode($res);
    }


  }


}
