<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_core');
        $this->load->model('m_kunjungan');
    }


    public function total_kunjungan()
    {
        $data = $this->m_kunjungan->get_total_kunjungan_today();
        echo json_encode($data->num_rows() );
    }

    public function fetch_antrian()
    {
        $data = $this->m_kunjungan->get_antrian_warga($this->session->userdata('no_kk') );
        foreach($data->result() as $row)
        {
            $json[] = array(
                'no_antri' => $row->no_antri,
                'no_kunjungan' => $row->no_kunjungan,
                'nama_anak' => $row->nama_lengkap,
                'umur' => $this->cek_umur($row->tgl_lahir),
                'jk' => $row->jk
            );
        }
        echo json_encode($json);
        
    }

    public function batal_antri()
    {
        $where = array(
            'no_kunjungan' => $this->input->post('no_kunjungan')
        );
        $delete = $this->m_core->delete_rows('t_kunjungan', $where);
        if($delete){
            $res = array(
                'msg' => 'Antrian Berhasil Di Batalkan',
                'code' => 200
            );
            echo json_encode($res);
        }else{
            $res = array(
                'msg' => 'Antrian Gagal Di Batalkan',
                'code' => 400
            );
            echo json_encode($res);
        }
    }


    function cek_umur($tgl_lahir)
    {
        $d1= new DateTime(date('Y-m-d'));
        $d2= new DateTime(date($tgl_lahir));
        $interval_kpi = $d1->diff($d2);
        $sprint='';
        if($interval_kpi->y != 0){
            $sprint .=$interval_kpi->y .' Tahun ';
        }
        if($interval_kpi->m != 0){
            $sprint .=$interval_kpi->m .' Bulan ';
        }
        if($interval_kpi->d != 0){
            $sprint .=$interval_kpi->d .' Hari ';
        }
        if($interval_kpi->h != 0){
            $sprint .=$interval_kpi->h .' Jam ';
        }
        if($interval_kpi->i != 0){
            $sprint .=$interval_kpi->i .' Menit ';
        }
        if($interval_kpi->s != 0){
            $sprint .=$interval_kpi->s .' Detik ';
        }             
        return $sprint;
    }


}