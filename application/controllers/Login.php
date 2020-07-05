<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('session');
        if($this->session->userdata('status') == "login"){
            redirect(base_url("admin"));
        }
    }
    

    public function index()
    {
        $this->load->view('login');
    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->m_login->cek_login("admin", $where)->num_rows();

        if($cek > 0){
            $data_session = array(
                'nama' => $username,
                'status' => "login" 
            );

            $this->session->set_userdata($data_session);
            redirect(base_url('admin'));
        }else{
            $data_session = array(
                'pesan' => "Username dan password salah !",
                'status' => "gagal" 
            );

            $this->session->set_userdata($data_session);
            redirect(base_url('login'));
        }
    }

}

/* End of file Controllername.php */
