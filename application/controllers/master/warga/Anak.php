<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->table = 't_anak';
        $this->foreignKey = $this->session->userdata('no_kk');
        $this->load->model('m_core');
    }

    function add()
    {
        $no_bpjs       = $this->input->post('no_bpjs');
        $nama_depan    = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_blkg');
        $tgl_lahir     = $this->input->post('tgl_lahir');
        $jk            = $this->input->post('jk');

        for($count = 0; $count < count($no_bpjs); $count++ )
        {
            $data = array(
                'no_bpjs' => $no_bpjs[$count],
                'no_kk'   => $this->foreignKey,
                'nama_depan' => $nama_depan[$count],
                'nama_belakang' => $nama_belakang[$count],
                'tgl_lahir' => $tgl_lahir[$count],
                'jenis_kelamin' => $jk[$count]
            );
            $insert =  $this->m_core->add_data($this->table, $data);
        }
        if($insert){
            $res = array('msg' => 'Berhasil Menambahkan Data Anak', 'code' => 200);
            echo json_encode($res);
        }else{
            $res = array('msg' => 'Gagal Menambahkan Anak','code' => 400);
            echo json_encode($res);
        }
    }

    function fetch()
    {
        $where = array(
            'no_kk' => $this->foreignKey
        );
        $data = $this->m_core->get_where($this->table, $where);
        echo json_encode($data->result());
    }

    function fetch_jadwal()
    {
        $data = $this->m_core->get_order('t_jadwal_kegiatan', 'tanggal_kegiatan','asc');
        echo json_encode($data->result());
    }




}