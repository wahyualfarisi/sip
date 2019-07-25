<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model{

  function create_report_imunisasi($dari_tanggal, $sampai_tanggal)
  {
    $query = "SELECT a.no_cek_imunisasi , a.id_imunisasi, a.umur as umur_current_imunisasi, a.tgl_cek_imunisasi, a.catatan,
                     b.id_imunisasi, b.nama_imunisasi,
                     c.no_kunjungan, c.tanggal_kunjungan, c.status,
                     d.no_kegiatan, d.nama_kegiatan, d.lokasi,
                     e.no_kms,
                     f.no_bpjs, f.no_kk, CONCAT(f.nama_depan, ' ', f.nama_belakang) as nama_anak, f.jenis_kelamin as jk,
                     g.no_kk, g.nama_ibu
             FROM t_cek_imunisasi a LEFT JOIN t_imunisasi b ON a.id_imunisasi = b.id_imunisasi
                                    LEFT JOIN t_kunjungan c ON a.no_kunjungan = c.no_kunjungan 
                                    LEFT JOIN t_jadwal_kegiatan d ON c.id_kegiatan = d.no_kegiatan
                                    LEFT JOIN t_kms e ON c.no_kms = e.no_kms 
                                    LEFT JOIN t_anak f ON e.no_bpjs = f.no_bpjs
                                    LEFT JOIN t_warga g ON f.no_kk = g.no_kk
             WHERE a.tgl_cek_imunisasi BETWEEN '$dari_tanggal' AND '$sampai_tanggal'
    ";
    return $this->db->query($query);
  }  

  function create_report_pertumbuhan($dari_tanggal, $sampai_tanggal)
  {
      $query = "SELECT a.no_cek_pertumbuhan, a.umur as umur_current_pertumbuhan, a.tb, a.bb, a.tgl_cek_pertumbuhan, a.hasil, a.catatan,
                       b.no_kunjungan, b.tanggal_kunjungan, b.status,
                       c.no_kegiatan, c.nama_kegiatan, c.lokasi,
                       d.no_kms, 
                       e.no_bpjs, CONCAT(e.nama_depan, ' ', e.nama_belakang) as nama_lengkap , e.jenis_kelamin as jk, 
                       f.no_kk, f.nama_ibu
                FROM t_cek_pertumbuhan a LEFT JOIN t_kunjungan b ON a.no_kunjungan = b.no_kunjungan
                                         LEFT JOIN t_jadwal_kegiatan c ON b.id_kegiatan = c.no_kegiatan 
                                         LEFT JOIN t_kms d ON b.no_kms = d.no_kms
                                         LEFT JOIN t_anak e ON d.no_bpjs = e.no_bpjs 
                                         LEFT JOIN t_warga f ON e.no_kk = f.no_kk
                WHERE a.tgl_cek_pertumbuhan BETWEEN '$dari_tanggal' AND '$sampai_tanggal'      
      ";
      return $this->db->query($query);
  }


}