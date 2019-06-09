<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table = 't_panitia';
    $this->load->model('m_core');
    // if($this->session->userdata('login') == 1){
    //   redirect(base_url('/'.$this->session->userdata('akses')));
    // }
  }

  function index()
  {
    $this->load->view('auth/form_login');
  }

  function process()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password'     => $this->input->post('password')
    );

    $datawithakses = array(
      'username'     => $this->input->post('username'),
      'password'     => $this->input->post('password'),
      'akses'        => $this->input->post('akses')
    );

    $check       = $this->m_core->get_where($this->table, $data);
    $check_akses = $this->m_core->get_where($this->table, $datawithakses);

    if($check->num_rows() != 1){
      echo json_encode(array('msg' => 'kode panitia dan password tidak sesuai', 'code' => 400 ));
      return;
    }else if($check_akses->num_rows() != 1){
      echo json_encode(array('msg' => 'Akses tidak sesuai', 'code' => 400 ));
      return;
    }else{
      // echo json_encode(array('msg' => 'berhasil'));
      foreach($check_akses->result() as $value)
      {
        if($value->akses == 'admin'){
          $session_value = array(
            'akses'        => $value->akses,
            'username' => $value->kode_panitia,
            'name' => $value->nama_panitia,
            'login' => 1
          );
          $res = array('msg' => 'login  berhasil', 'location' => 'Admin','code' => 200);
          echo json_encode($res);
        }else if($value->akses == 'kader'){
          $session_value = array(
            'akses'        => $value->akses,
            'username' => $value->kode_panitia,
            'name' => $value->nama_panitia,
            'login' => 1
          );
          $res = array('msg' => 'login  berhasil', 'location' => 'Kader', 'code' => 200 );
          echo json_encode($res);
        }else if($value->akses == 'ketua'){
          $session_value = array(
            'akses'        => $value->akses,
            'username' => $value->kode_panitia,
            'name' => $value->nama_panitia,
            'login' => 1
          );
          $res = array('msg' => 'login  berhasil', 'location' => 'Ketua', 'code' => 200);
          echo json_encode($res);
        }else{
          $res = array('msg' => 'terjadi kendala', 'code' => 500);
          echo json_encode($res);
        }

        $this->session->set_userdata($session_value);
      }
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('/Login');
  }

}
