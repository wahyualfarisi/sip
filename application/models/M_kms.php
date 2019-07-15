<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kms extends CI_Model {

    public function fetch_kms($key)
    {
        $query = "SELECT a.no_kms, a.no_bpjs AS bpjs_number,  a.tanggal_terdaftar, a.berat_badan_lahir AS bb , a.panjang_badan_lahir AS pb, 
                         b.no_kk , b.jenis_kelamin AS jk ,
                         CONCAT(b.nama_depan,' ',  b.nama_belakang) AS nama_lengkap
                  FROM
                  t_kms a LEFT JOIN t_anak b ON a.no_bpjs = b.no_bpjs
                  WHERE 
                  b.nama_depan LIKE '%$key%' OR 
                  a.no_kms LIKE '%$key%' OR 
                  b.nama_belakang LIKE '%$key%'

                 ";
                 return $this->db->query($query);
    }

    public function fetch_anakwarga_with_kms($no_kk)
    {
        $query = "SELECT a.no_bpjs, CONCAT(a.nama_depan ,' ', a.nama_belakang) as nama_lengkap , a.jenis_kelamin, a.tgl_lahir,
                         b.no_kms, b.tanggal_terdaftar, b.berat_badan_lahir as bb_lahir, b.panjang_badan_lahir as pb_lahir
                  FROM t_anak a LEFT JOIN t_kms b ON a.no_bpjs = b.no_bpjs 
                                          WHERE b.no_kms IS NOT NULL AND a.no_kk = '$no_kk'
                ";
                return $this->db->query($query);
    }

    public function fetch_detail_kms($kms)
    {
        $query = "SELECT a.no_kms, a.berat_badan_lahir as bb_lahir, a.panjang_badan_lahir as pb_lahir,
                         b.no_bpjs, CONCAT(b.nama_depan, ' ', b.nama_belakang) as nama_lengkap, b.jenis_kelamin as jk, b.tgl_lahir,
                         c.no_kk , c.email, c.nama_ayah , c.nama_ibu, c.alamat, c.no_telp, c.tanggal_terdaftar,
                         d.no_kunjungan, d.no_antri, d.tanggal_kunjungan, d.status
                  FROM t_kms a 
                         LEFT JOIN t_anak b ON a.no_bpjs = b.no_bpjs
                         LEFT JOIN t_warga c ON b.no_kk = c.no_kk
                         LEFT JOIN t_kunjungan d ON a.no_kms = d.no_kms
                  WHERE a.no_kms = '$kms' 
                 ";
        return $this->db->query($query);
    }


}
