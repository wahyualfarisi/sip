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


}
