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
    date_default_timezone_set('Asia/Jakarta');
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

    $check_nokms = $this->m_core->get_where($this->table, array(
                                              $this->foreignKEY_2 => $targetID,
                                              $this->foreignKEY_1 => $no_kegiatan
                                            ));

    if($check_nokms->num_rows() > 0) {
      $res = array('msg' => 'No. '.$targetID.' Sudah Dalam Antrian ', 'code' => 400  );
      echo json_encode($res);
      return;
    }

    $data_insert = array(
      'no_kunjungan' => $this->generateAutoNumber(),
      'no_kms' => $targetID,
      'id_kegiatan' => $no_kegiatan,
      'no_antri' => $this->no_antri(),
      'tanggal_kunjungan' => date('Y-m-d'),
      'status' => 'antri'
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

  public function fetch_antrian($id_kegiatan)
  {
    $data = $this->m_kunjungan->fetch_antrian_kunjungan($id_kegiatan);
    echo json_encode($data->result() );
  }

  public function fetch_no_urut_current($id)
  {
    $data = $this->m_kunjungan->fetch_no_urut_current($id);
    echo json_encode($data->result() );
  }

  public function fetch_monitor_antri($id)
  {
    $data = $this->m_kunjungan->fetch_monitor_antri($id);
    echo json_encode($data->result() );
  }

  public function chart_antrian($id)
  {
    $data = $this->m_kunjungan->chart_antrian($id);
    echo json_encode($data->result() );
  }

  public function get_total_status($status, $id_kegiatan)
  {
    $where = array('status' => $status, 'id_kegiatan' => $id_kegiatan);
    $data = $this->m_core->get_where($this->table, $where);
    echo json_encode($data->num_rows());
  }

  public function get_total_kunjungan($id_kegiatan)
  {
    $data = $this->m_kunjungan->fetch_antrian_kunjungan($id_kegiatan);
    echo json_encode($data->num_rows() );
  }

  public function action_next_antrian()
  {
    //antri to proses 
    $where = array(
      'no_kunjungan' => $this->input->post('no_kunjungan')
    );
    $data = array(
      'status' => 'proses'
    );
    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array(
        'msg' => 'Antrian Selanjutnya',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Terjadi Kesalahan',
        'code' => 400
      );
      echo json_encode($res);
    }
    
  }

  public function action_skip_antrian()
  {
    //antri to terlewat 
    $where = array(
      'no_kunjungan' => $this->input->post('no_kunjungan')
    );
    $data = array(
      'status' => 'terlewat'
    );
    $update = $this->m_core->update_table($this->table, $data, $where);
    if($update){
      $res = array(
        'msg' => 'Antrian Selanjutnya',
        'code' => 200
      );
      echo json_encode($res);
    }else{
      $res = array(
        'msg' => 'Terjadi Kesalahan',
        'code' => 400
      );
      echo json_encode($res);
    }
    
  }

  function update_status_selesai()
  {
      $where = array(
          'no_kunjungan' => $this->input->post('id_target')
      );
      $data = array(
          'status' => 'selesai'
      );
      $update = $this->m_core->update_table($this->table, $data, $where);
      if($update){
        $res = array(
          'code' => 200
        );
        echo json_encode($res);
      }else{
        $res = array(
          'code' => 400
        );
        echo json_encode($res);
      }
  }


  function daftar_kunjungan($id_kegiatan)
  {
    //list per jadwal kegiatan 

    $data_kegiatan  = $this->m_core->get_where('t_jadwal_kegiatan', array('no_kegiatan' => $id_kegiatan) );

    $data_kunjungan = $this->m_kunjungan->daftar_kunjungan($id_kegiatan);

    $output = json_encode(array(
      'jadwal_kegiatan' => $data_kegiatan->result(),
      'data_kunjungan' => $data_kunjungan->result(),
      'jumlah_kunjungan' => $data_kunjungan->num_rows()
    ));

    echo $output;
    

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

  public function no_antri()
  {
    $data = $this->m_core->getMaxNumber($this->table, 'no_antri');
    $kode = $data->result()[0]->maxKode;
    $kode++;
    // $nourut = (int) substr($kode, 1, 1);
    // $nourut++;

    return $kode;
  }


  

}