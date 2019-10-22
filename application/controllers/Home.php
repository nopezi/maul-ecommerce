<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }
    

    public function index()
    {
        $produk       = $this->m_produk->tampil();
        $kategori     = $this->m_kategori->tampil_kategori();
        $produk_limit = $this->m_produk->tampil_limit();

        foreach($produk as $t){
            foreach($kategori as $k){
                if($t->id_kategori == $k->id_kategori){
                    $tes2[] = array(
                        'id_kategori' => $t->id_kategori,
                            array(
                                'nama_produk'  => $t->nama_produk,
                                'kategori'     => $t->kategori,
                                'sub_kategori' => $t->sub_kategori,
                                'harga'        => $t->harga,
                                'ukuran'       => $t->ukuran,
                                'harga_ukuran' => $t->harga_ukuran,
                                'gambar'       => $t->gambar,
                                'keterangan'   => $t->keterangan,
                            ) 
                    );
                }
            }
        }

        $data['tes'] =$tes2;
        $data['produk_limit'] = $produk_limit;

        $data['data_kategori'] = $this->m_kategori->tampil_kategori();
        $data['data_produk'] = $this->m_produk->tampil();
        
        $this->load->view('content/header');
        $this->load->view('home', $data);
    }

    public function kategori($id){
        if(!empty($id)){
        $data['data_produk'] = $this->m_produk->tampil_perid($id);
        $this->load->view('content/header');
        $this->load->view('frontend/kategori', $data);
        $this->load->view('content/footer');
        }else{
            echo 'kosong';
        }
    }
    
    public function detail($id){
        if(!empty($id)){
            $data['data_produk'] = $this->m_produk->tampil_detail($id);
            $this->load->view('content/header');
            $this->load->view('frontend/detail_product', $data);
        }
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

    public function order_product(){
        $nama_produk = $this->input->post('nama_produk');
        $id_produk   = $this->input->post('id_produk');
        $id_kategori = $this->input->post('id_kategori');
        $ukuran      = $this->input->post('ukuran');
        $warna       = $this->input->post('warna');
        $jumlah      = $this->input->post('quantity');
        $harga       = $this->input->post('harga');
        $harga_ukuran= $this->input->post('harga_ukuran');

        $data['order'] = array(
            'id_produk'   => $id_produk,
            'id_kategori' => $id_kategori,
            'nama_produk' => $nama_produk,
            'ukuran'      => $ukuran,
            'warna'       => $warna,
            'harga'       => $harga,
            'harga_ukuran'=> $harga_ukuran,
            'jumlah'      => $jumlah
        );

        if(!empty($id_produk)){
            $this->load->view('content/header');
            $this->load->view('frontend/order_product', $data);
        }else{
            echo 'kosong';
        }
    }

}

/* End of file Index.php */
