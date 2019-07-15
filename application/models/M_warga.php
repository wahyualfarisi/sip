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

  

}
