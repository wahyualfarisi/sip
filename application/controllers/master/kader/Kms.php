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
    $this->load->model('m_kunjungan');
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

  public function update()
  {
    $where = array('no_kms' => $this->input->post('no_kms') );
    $data  = array(
      'panjang_badan_lahir' => $this->input->post('pb'),
      'berat_badan_lahir'   => $this->input->post('bb')
    );
    $delete = $this->m_core->update_table($this->table, $data, $where);
    if($delete){
      $res = array('msg' => 'KMS Berhasil Di Update', 'code' => 200);
      echo json_encode($res);
    }else{
      $res = array('msg' => 'Kms Gagal Di Update', 'code' => 400);
      echo json_encode($res);
    }
  }

  public function fetch_detail_kms($kms)
  {
    $data             = $this->m_kms->fetch_detail_kms($kms);
    
    $no_kunjungan = [];

      if($data->num_rows() > 0)
      {
        foreach($data->result() as $row)
        {
          array_push($no_kunjungan, $row->no_kunjungan);


          $datakunjungan[] = array(
            'no_kunjungan'      => $row->no_kunjungan,
            'no_antri'          => $row->no_antri,
            'tanggal_kunjungan' => $row->tanggal_kunjungan,
            'status'            => $row->status
          );

          $datakms[] = array(
            'no_kms'       => $row->no_kms,
            'no_kunjungan' => $row->no_kunjungan,
            'no_bpjs'      => $row->no_bpjs,
            'nama_anak'    => $row->nama_lengkap,
            'jk'           => $row->jk,
            'tgl_lahir'    => $row->tgl_lahir,
            'orangtua'     => array(
                                  'no_kk'    => $row->no_kk,
                                  'nama_ibu' => $row->nama_ibu,
                                  'nama_ayah' => $row->nama_ayah,
                                  'alamat'    => $row->alamat,
                                  'no_telp'   => $row->no_telp
            )
          );
        }

        $source_kunjungan = $this->m_kunjungan->get_kunjungan($no_kunjungan, $kms);

        if($source_kunjungan->num_rows() > 0){
          foreach($source_kunjungan->result() as $k)
            {
              $detail_kunjungan[] = array(
                  'no_kunjungan'       => $k->no_kunjungan,
                  'imunisasi'          => array(
                  'no_cek_imunisasi'   => $k->no_cek_imunisasi,
                  'id_imunisasi'       => $k->id_imunisasi,
                  'umur_cek_imunisasi' => $k->umur_cek_imunisasi,
                  'tgl_cek_imunisasi'  => $k->tgl_cek_imunisasi,
                  'catatan_imunisasi'  => $k->catatan_imunisasi           
                ),
                'pertumbuhan'  => array(
                  'no_cek_pertumbuhan' => $k->no_cek_pertumbuhan,
                  'umur_cek_pertumbuhan' => $k->umur_cek_pertumbuhan,
                  'tb' => $k->tb,
                  'bb' => $k->bb,
                  'hasil' => $k->hasil,
                  'catatan_pertumbuhan' => $k->catatan_pertumbuhan
                )
              );
            }
        }else{
          $detail_kunjungan = array();
        }
        

        echo json_encode(array(
          'kms'       => $datakms,
          'kunjungan' => $datakunjungan,
          'detail_kunjungan' => $detail_kunjungan,
        ));
      }else{
        echo json_encode(array(
          'kms'       => 0,
          'kunjungan' => 0,
          'detail_kunjungan' => 0,
          'status' => 404,
          'msg' => 'Source Not Found'
        ));
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