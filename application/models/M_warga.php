<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warga extends CI_Model{


  function fetch_data($query)
  {
    $query = $this->db->query("SELECT a.nama_ayah, a.nama_ibu, a.email, a.no_kk, a.alamat,COUNT(b.no_bpjs) AS JUMLAH_ANAK
                               FROM t_warga AS a LEFT JOIN t_anak AS b
                               USING(no_kk)
                               WHERE no_kk LIKE '%$query%'
                                    OR nama_ayah LIKE '%$query%'
                                    OR nama_ibu  LIKE '%$query%'
                                    OR alamat LIKE '%$query%'
                               GROUP BY a.no_kk
                               HAVING JUMLAH_ANAK >= 0
                              ");
    return $query;
  }

  function fetch_anak_warga($query)
  {
    $query = "SELECT * FROM t_anak WHERE nama_depan LIKE '%$query%' OR nama_belakang LIKE '%$query%' OR no_kk LIKE '%$query%'  ";
    return $this->db->query($query);
  }

  function fetch_detail_anak($no_bpjs)
  {
    $query = "SELECT a.no_bpjs , a.no_kk, CONCAT(a.nama_depan, ' ', a.nama_belakang) as nama_anak, a.jenis_kelamin as jk, a.tgl_lahir,
                     b.no_kms, b.tanggal_terdaftar, b.berat_badan_lahir as bb_lahir, b.panjang_badan_lahir as pb_lahir
              FROM t_anak a LEFT JOIN t_kms b ON a.no_bpjs = b.no_bpjs 
              WHERE a.no_bpjs = '$no_bpjs'
             ";
    return $this->db->query($query);
  }

  

}
