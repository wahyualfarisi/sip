<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{


    public function get_detail_kunjungan($id_kegiatan)
    {
        $query = "SELECT COUNT(no_kunjungan) as totalKunjungan ,  SUM( status = 'selesai') as totalSelesai , SUM(status = 'terlewat') as totalTerlewat  FROM t_kunjungan 
                    WHERE id_kegiatan = '$id_kegiatan' AND tanggal_kunjungan <= CURDATE() ";
        return $this->db->query($query);
    }

    public function kunjungan_hari_ini()
    {
        $query = "SELECT a.no_kunjungan, a.no_antri, a.tanggal_kunjungan, a.status,
                         b.no_kms,
                         c.no_bpjs, CONCAT(c.nama_depan, ' ', c.nama_belakang) as nama_anak
                  FROM t_kunjungan a LEFT JOIN t_kms b ON a.no_kms = b.no_kms
                                     LEFT JOIN t_anak c ON b.no_bpjs = c.no_bpjs
                                     WHERE DATE(a.tanggal_kunjungan) = CURDATE()
        ";
        return $this->db->query($query);
    }

    public function kunjungan_per_tgl_kegiatan()
    {
        $query = "SELECT a.no_kegiatan, a.nama_kegiatan, a.tanggal_kegiatan, a.lokasi, 
                         b.no_kunjungan, COUNT(b.no_kunjungan) as totalKunjungan
                  FROM t_jadwal_kegiatan a LEFT JOIN t_kunjungan b ON a.no_kegiatan = b.id_kegiatan
                  GROUP BY a.tanggal_kegiatan        
        ";
        return $this->db->query($query);
    }



}
