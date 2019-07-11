<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{


    public function get_detail_kunjungan($id_kegiatan)
    {
        $query = "SELECT COUNT(no_kunjungan) as totalKunjungan ,  SUM( status = 'selesai') as totalSelesai , SUM(status = 'terlewat') as totalTerlewat  FROM t_kunjungan 
                    WHERE id_kegiatan = '$id_kegiatan' AND tanggal_kunjungan <= CURDATE() ";
        return $this->db->query($query);
    }



}
