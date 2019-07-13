<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tumbuh_anak extends CI_Model {

    public function get_data_tumbuh_anak($query)
    {
        $query = "SELECT a.no_cek_pertumbuhan, a.no_kunjungan, a.umur, a.tb , a.bb, a.tgl_cek_pertumbuhan, a.hasil, a.catatan,
                         b.no_kunjungan, b.no_antri, b.status, 
                         c.no_kms, 
                         d.no_bpjs, d.no_kk, CONCAT(d.nama_depan ,' ', d.nama_belakang) as nama_lengkap, d.jenis_kelamin as jk , d.tgl_lahir
                  FROM t_cek_pertumbuhan a LEFT JOIN t_kunjungan b ON a.no_kunjungan = b.no_kunjungan 
                                           LEFT JOIN t_kms c ON b.no_kms = c.no_kms 
                                           LEFT JOIN t_anak d ON c.no_bpjs = d.no_bpjs
                  WHERE d.nama_depan LIKE '%$query%'
                ";
        return $this->db->query($query);
    }


}
