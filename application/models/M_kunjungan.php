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

    public function fetch_antrian_kunjungan($id_kegiatan)
    {
        $query = "SELECT a.no_kunjungan , a.tanggal_kunjungan, a.status, a.no_antri , a.no_kms,
                         b.no_bpjs, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                         c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk 
                         FROM t_kunjungan a 
                         LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                         LEFT JOIN t_anak c ON b.no_bpjs = c.no_bpjs
                         WHERE a.id_kegiatan = '$id_kegiatan'
                         ORDER BY a.no_antri ASC
        ";
        return $this->db->query($query);
    }

    public function fetch_no_urut_current($id_kegiatan)
    {
        $query = "SELECT no_antri FROM t_kunjungan WHERE id_kegiatan = '$id_kegiatan' AND status = 'antri' ORDER BY no_antri ASC LIMIT 1    ";
        return $this->db->query($query);
    }

    public function fetch_monitor_antri($id_kegiatan)
    {
        $query = "SELECT a.no_kunjungan , a.tanggal_kunjungan, a.status, a.no_antri , a.no_kms,
                    b.no_bpjs, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                    c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk 
                    FROM t_kunjungan a 
                    LEFT JOIN t_kms b ON a.no_kms = b.no_kms 
                    LEFT JOIN t_anak c ON b.no_bpjs = c.no_bpjs
                    WHERE a.id_kegiatan = '$id_kegiatan'
                    AND a.status = 'antri'
                    ORDER BY a.no_antri ASC
                    LIMIT 1
                ";
        return $this->db->query($query);
    }

    public function chart_antrian($id_kegiatan)
    {
        $query = "SELECT SUM(status = 'antri') as totalantri, SUM(status = 'proses') as totalproses, SUM(status = 'terlewat') as totalterlewat, SUM(status = 'selesai') as totalselesai FROM t_kunjungan WHERE id_kegiatan = '$id_kegiatan' ";
        return $this->db->query($query);
    }

    public function ListKunjunganOnCheckout($query)
    {
        $query = "SELECT a.no_kunjungan , a.no_antri, a.status, a.no_kms,
                         b.no_bpjs, b.berat_badan_lahir as bb_lahir , b.panjang_badan_lahir as pb_lahir,
                         c.no_kk, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_lengkap, c.jenis_kelamin as jk , c.tgl_lahir
                  FROM t_kunjungan a 
                       LEFT JOIN t_kms b ON a.no_kms = b.no_kms
                       LEFT JOIN t_anak c ON b.no_bpjs = c.no_bpjs

                   WHERE date(a.tanggal_kunjungan) = CURDATE() AND a.status != 'antri' AND a.status != 'selesai'
         ";
         return $this->db->query($query);
    }

}

