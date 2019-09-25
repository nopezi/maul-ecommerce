<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('content/header');
        $this->load->view('home');
    }

    public function lengan_panjang(){
        $this->load->view('content/header');
        $this->load->view('frontend/lengan_panjang');
        $this->load->view('content/footer');
    }

    public function lengan_pendek(){
        $this->load->view('content/header');
        $this->load->view('frontend/lengan_pendek');
        $this->load->view('content/footer');
    }

    public function hoodie(){
        $this->load->view('content/header');
        $this->load->view('frontend/hoodie');
        $this->load->view('content/footer');
    }

    public function detail_product(){
        $this->load->view('content/header');
        $this->load->view('frontend/detail_product');
    }

}

/* End of file Index.php */
