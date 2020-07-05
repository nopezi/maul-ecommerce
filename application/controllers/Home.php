<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_slide');
        $this->load->model('m_pesan');
    }

    public function index()
    {
        $data['produk'] = $this->m_produk->tampil();
        $kategori = $this->m_kategori->tampil_kategori();
        $data['per_kategori'] = $this->m_produk->tampil_perkategori();
        $data['slide'] = $this->m_slide->tampil();
        $data['kategori'] = $this->m_kategori->tampil_kategori();
        $data['kategori_1'] = $this->m_produk->tampil_kategori_1();
        $data['kategori_2'] = $this->m_produk->tampil_kategori_2();
        $data['kategori_3'] = $this->m_produk->tampil_kategori_3();
        $data['kategori_4'] = $this->m_produk->tampil_kategori_4();

        $produk_limit       = $this->m_produk->tampil_limit();

        foreach($produk_limit as $pl) {
            $gambar = $this->db->get_where('gambar', array('id_produk' => $pl->id_produk))->result();
            $pl->gambar = $gambar[0]->gambar;

        }

        $data['produk_limit'] = $produk_limit;

        $produk = $this->db->get('produk')->result();

        foreach($produk as $p) {

            $gambar = $this->db->get_where('gambar', ['id_produk' => $p->id_produk])->result();

        }

        // echo '<pre>';
        // print_r($produk);


        $this->load->view('home/header', $data);
        $this->load->view('home/index', $data);

        // echo '<pre>';
        // print_r($per_kategori);

        // $nilai = 100;
        $data = [1,2,3,4,5,6,7,8,9,10];
        $lipat = 4;
        // // echo sizeof($produk);
        // $nilai_awal = 0;
        // for ($i= 1; $i < sizeof($data); $i++) { 
        //     if ( $bagi = $i % $lipat == 0 ) {
        //         echo 'Nilai awal' . $nilai_awal . ' nilai akhir ' . $i . '<br>';
        //         $nilai_awal = $i;
        //     }
        // }

        // $lipat = 3;
        // $nilai_awal = 0;
        // for ($i=1; $i < sizeof($produk); $i++) { 
        //     if ($bagi = $i % $lipat == 0) {
        //         echo 'Nilai awal' . $nilai_awal . ' nilai akhir ' . $i . '<br>';
        //         $nilai_awal = $i;
        //         // echo 'nilai awal cek '.$nilai_awal.'<br>';
        //     }
        // }

        // echo "<pre>";
        // print_r($produk);
    }

    public function kategori($id)
    {
        if (!empty($id)) {
            $data['data_produk'] = $this->m_produk->tampil(null,null,$id);
            $data['kategori'] = $this->m_kategori->tampil_kategori();
            $this->load->view('content/header', $data);
            $this->load->view('frontend/kategori', $data);
            $this->load->view('content/footer');
        } else {
            echo 'kosong';
        }
    }

    public function sk()
    {
        $sub_kategori     = $this->input->get('sk');
        $data['tampil']   = $this->m_produk->tampil_subkategori($sub_kategori);
        $data['produk']   = $this->m_produk->tampil(null,$sub_kategori,null);
        $data['kategori'] = $this->m_kategori->tampil_kategori();

        if (!empty($sub_kategori)) {

            $this->load->view('content/header', $data);
            $this->load->view('frontend/subkategori', $data);
            $this->load->view('content/footer');

        } else {

            redirect(base_url());

        }
        // print_r($data['produk']);
    }

    public function detail($id)
    {
        if (!empty($id)) {
            // $data['data_produk'] = $this->m_produk->tampil_detail($id);
            $data['data_produk'] = $this->m_produk->tampil($id);
            $data['kategori'] = $this->m_kategori->tampil_kategori();
            $this->load->view('content/header', $data);
            $this->load->view('frontend/detail_product', $data);
        }
    }

    public function pesan(){
        $tambah = [
            'nama_pembeli'  => $this->input->post('nama_pembeli'),
            'no_hp'         => $this->input->post('no_hp'),
            'alamat'        => $this->input->post('alamat'),
            'produk'        => $this->input->post('produk'),
            'warna_produk'  => $this->input->post('warna'),
            'ukuran_produk' => $this->input->post('ukuran'),
            'quantity'      => $this->input->post('jumlah'),
            'total_harga'   => $this->input->post('harga'),
            'created_at'    => date('d-m-Y H:s'), 
        ];

        $data['data_pesan'] = $this->m_pesan->tambah_pesan($tambah);

        $data['kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('content/header', $data);
        $this->load->view('frontend/pesan', $data);
        // print_r($data['data_pesan']);
    }

    public function search()
    {
        $search = $this->input->get('s');
        $data['tampil'] = $this->m_produk->tampil_search($search);
        $data['kategori'] = $this->m_kategori->tampil_kategori();

        if (!empty($search)) {
            $this->load->view('content/header', $data);
            $this->load->view('frontend/search', $data);
            $this->load->view('content/footer');
        } else {
            redirect(base_url());
        }
    }

    public function lengan_panjang()
    {
        $this->load->view('content/header');
        $this->load->view('frontend/lengan_panjang');
        $this->load->view('content/footer');
    }

    public function lengan_pendek()
    {
        $this->load->view('content/header');
        $this->load->view('frontend/lengan_pendek');
        $this->load->view('content/footer');
    }

    public function hoodie()
    {
        $this->load->view('content/header');
        $this->load->view('frontend/hoodie');
        $this->load->view('content/footer');
    }

    public function detail_product()
    {
        $this->load->view('content/header');
        $this->load->view('frontend/detail_product');
    }

    public function order_product()
    {
        $nama_produk = $this->input->post('nama_produk');
        $id_produk = $this->input->post('id_produk');
        $id_kategori = $this->input->post('id_kategori');
        $ukuran = $this->input->post('ukuran');
        $warna = $this->input->post('warna');
        $jumlah = $this->input->post('quantity');
        $harga = $this->input->post('harga');
        $harga_ukuran = $this->input->post('harga_ukuran');

        $data['order'] = array(
            'id_produk' => $id_produk,
            'id_kategori' => $id_kategori,
            'nama_produk' => $nama_produk,
            'ukuran' => $ukuran,
            'warna' => $warna,
            'harga' => $harga,
            'harga_ukuran' => $harga_ukuran,
            'jumlah' => $jumlah,
        );

        // echo '<pre>';
        // print_r($data);

        if (!empty($id_produk)) {
            $data['kategori'] = $this->m_kategori->tampil_kategori();
            $this->load->view('content/header', $data);
            $this->load->view('frontend/order_product', $data);
        } else {
            echo 'kosong';
        }
    }

    public function tes()
    {
        $this->load->view('errors/tes');
    }

    public function tes_carousel()
    {
        $this->load->view('content/carousel_tes');
    }

}

/* End of file Index.php */
