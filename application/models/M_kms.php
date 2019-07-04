<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kms extends CI_Model {

    public function fetch_kms()
    {
        $query = "SELECT a.no_kms, a.no_bpjs AS bpjs_number,  a.tanggal_terdaftar, a.berat_badan_lahir AS bb , a.panjang_berat_badan_lahir AS pb
                         b.no_kk, CONCAT(b.nama_depan, b.nama_belakang) , b.jenis_kelamin AS jk 
                  FROM
                  t_kms LEFT JOIN t_anak ON a.no_bpjs = b.no_bpjs
                 ";
                 return $this->db->query($query);
    }


}
