<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('content/header');
        $this->load->view('home');
    }

    public function lengan_panjang(){
        $this->load->view('content/header');
        $this->load->view('lengan_panjang');
        $this->load->view('content/footer');
    }

    public function lengan_pendek(){
        $this->load->view('content/header');
        $this->load->view('lengan_pendek');
        $this->load->view('content/footer');
    }

    public function hoodie(){
        $this->load->view('content/header');
        $this->load->view('hoodie');
        $this->load->view('content/footer');
    }

    public function detail_product(){
        $this->load->view('content/header');
        $this->load->view('detail_product');
        $this->load->view('content/footer');
    }

}

/* End of file Index.php */
