<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kunjungan extends CI_Model{


    public function fetch_list_kms()
    {
        $query = "SELECT a.no_antri, a.tanggal_kunjungan, a.status , 
                         b.no_bpjs, b.berat_badan_lahir as bb_lahir, b.panjang_badan_lahir as pb_lahir,
                         c.nama_depan , c.nama_belakang , c.jenis_kelamin, c.no_kk
                  FROM t_kunjungan a RIGHT JOIN t_kms b ON a.no_kms = b.no_kms 
                                     RIGHT JOIN t_anak c ON b.no_bpjs = c.no_bpjs 
                  WHERE a.no_antri IS NULL";
        return $this->db->query($query);
    }

    public function fetch_jadwal_kegiatan()
    {
        $query = "SELECT * FROM t_jadwal_kegiatan WHERE DATE(tanggal_kegiatan) =  CURDATE() ";
        return $this->db->query($query);
    }

}

