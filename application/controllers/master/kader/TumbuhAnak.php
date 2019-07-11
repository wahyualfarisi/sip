<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TumbuhAnak extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->table        = 't_cek_pertumbuhan';
        $this->primary      = 'no_cek_pertumbuhan';
        $this->load->model('m_kunjungan');
        $this->load->model('m_core');
    }


    function ListKunjunganOnCheckout()
    {
        $query = '';
        if($this->input->post('query') ){
            $query = $this->input->post('query');
        }
        $data = $this->m_kunjungan->ListKunjunganOnCheckout($query);
        foreach($data->result() as $row){
            $json[] = array(
                'no_kunjungan' => $row->no_kunjungan,
                'no_antri' => $row->no_antri,
                'status' => $row->status,
                'no_kms' => $row->no_kms,
                'no_bpjs' => $row->no_bpjs,
                'bb_lahir' => $row->bb_lahir,
                'no_kk' => $row->no_kk,
                'nama_lengkap' => $row->nama_lengkap,
                'jk' => $row->jk,
                'tgl_lahir' => $row->tgl_lahir,
                'umur' => $this->cek_umur($row->tgl_lahir)
            );
        }
        echo json_encode($json);

        
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
