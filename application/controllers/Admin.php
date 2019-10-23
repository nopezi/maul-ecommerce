<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->helper(array('form', 'url'));
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }
    

    public function index()
    {
        // $this->load->view('backend/core/header');
        redirect(base_url('admin/home'));
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    function home(){
        $this->load->view('backend/home');
    }

    /* PRODUK */

    function produk(){
        $data['data_produk'] = $this->m_produk->tampil();
        $data['halaman'] = 'Produk';
        $this->load->view('backend/produk', $data);
    }

    function tambah_produk(){
        $data['halaman'] = 'Tambah Produk';
        $data['kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('backend/tambah_produk', $data);
    }

    function aksi_simpan_produk(){
        $nama_produk  = $this->input->post('nama_produk');
        $kategori     = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $harga        = $this->input->post('harga');
        $ukuran       = $this->input->post('ukuran');
        $harga_ukuran = $this->input->post('harga_ukuran');
        $keterangan   = $this->input->post('keterangan');
        $foto         = $this->input->post('file');

        $harga_ukuran = implode(',', $harga_ukuran);
        $ukuran = implode(',', $ukuran);

        if($_FILES['file'])  
        {  
            $number_of_files = sizeof($_FILES['file']['tmp_name']);  
            $files = $_FILES['file'];  
            $config=array(  
            'upload_path' => './assets/gambar/', //direktori untuk menyimpan gambar  
            'allowed_types' => 'jpg|jpeg|png|gif',  
            // 'max_size' => '2000',  
            // 'max_width' => '2000',  
            // 'max_height' => '2000',
            'encrypt_name' => TRUE  
            );
              
            for ($i = 0;$i < $number_of_files; $i++)  
            {  
                $_FILES['file']['name'] = $files['name'][$i];  
                $_FILES['file']['type'] = $files['type'][$i];  
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];  
                $_FILES['file']['error'] = $files['error'][$i];  
                $_FILES['file']['size'] = $files['size'][$i];  
                $this->load->library('upload', $config);  
                if($this->upload->do_upload('file')){
                    $data[] = array('upload_data' => $this->upload->data());
                    // $data[$i] = $this->upload->data();
                    echo '<pre>';
                    // print_r(json_encode($data));
                    echo '<pre>';
                    // echo $data[];
                }else{
                    // $error = array('error' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    // echo '<pre>';
                    // print_r($error);
                    // echo '<pre>';
        
                    $this->session->set_flashdata('gagal', $error);
                    redirect(base_url('admin/tambah_produk'));
                } 
                 
            }

            foreach($data as $dt){
                $nama_gambar[] = $dt['upload_data']['file_name'];
            }

            // print_r(json_encode($nama_gambar));
            $nama_gambar_gabung = implode(',', $nama_gambar);

            $data = array(
                'nama_produk'  => $nama_produk,
                'id_kategori'  => $kategori,
                'sub_kategori' => $sub_kategori,
                'harga'        => $harga,
                'ukuran'       => $ukuran,
                'harga_ukuran' => $harga_ukuran,
                'gambar'       => $nama_gambar_gabung,
                'keterangan'   => $keterangan 
            );

            $result = $this->m_produk->tambah('produk', $data);
            // echo $result;
            // print_r(json_encode($data));
            if($result == true){
                redirect('admin/produk');
            }
        }else{
            $error = 'kosong';
            $this->session->set_flashdata('gagal', $error);
            redirect(base_url('admin/tambah_produk'));
        }
    }

    function edit_produk($id){
        // $this->m_produk;
        $data['halaman']  = 'Edit Produk';
        $data['produk']   = $this->m_produk->tampil_detail($id);
        $data['kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('backend/edit_produk', $data);
    }

    function aksi_edit_produk(){
        $nama_produk  = $this->input->post('nama_produk');
        $id_produk    = $this->input->post('id_produk');
        $id_kategori  = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $keterangan   = $this->input->post('keterangan');
        $harga        = $this->input->post('harga');
        $ukuran       = $this->input->post('ukuran');
        $harga_ukuran = $this->input->post('harga_ukuran');
        $file2         = $this->input->post('file');

        if($_FILES['file'])  
        {  
            $number_of_files = sizeof($_FILES['file']['tmp_name']);  
            $files = $_FILES['file'];  
            $config=array(  
            'upload_path' => './assets/gambar/', //direktori untuk menyimpan gambar  
            'allowed_types' => 'jpg|jpeg|png|gif',  
            // 'max_size' => '2000',  
            // 'max_width' => '2000',  
            // 'max_height' => '2000',
            'encrypt_name' => TRUE  
            );
              
            for ($i = 0;$i < $number_of_files; $i++)  
            {  
                $_FILES['file']['name']     = $files['name'][$i];  
                $_FILES['file']['type']     = $files['type'][$i];  
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];  
                $_FILES['file']['error']    = $files['error'][$i];  
                $_FILES['file']['size']     = $files['size'][$i];  
                $this->load->library('upload', $config);  
                if($this->upload->do_upload('file')){
                    $data[] = array('upload_data' => $this->upload->data());
                    // $data[$i] = $this->upload->data();
                    echo '<pre>';
                    print_r($data);
                    echo '<pre>';
                    // echo $data[];
                }else{
                    // $error = array('error' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    echo '<pre>';
                    print_r($error);
                    echo '<pre>';
                    // echo $i;
                    $data2[] = $file2[$i];
                    // print_r($file2);
        
                    // $this->session->set_flashdata('gagal', $error);
                    // redirect(base_url('admin/tambah_produk'));
                } 
                 
            }
            echo '<br>';
            print_r($data);
            print_r($data2);

            foreach($data as $dt){
                $nama_gambar[] = $dt['upload_data']['file_name'];
            }
            
            $gabung = array_merge($nama_gambar, $data2);

            print_r($gabung);

            // $nama_gambar_gabung = implode(',', $nama_gambar);

            // echo $result;
            // print_r(json_encode($data));
            // if($result == true){
            //     redirect('admin/produk');
            // }
        }

        // $data = array(
        //     'nama_produk'  => $nama_produk,
        //     'id_kategori'  => $id_kategori,
        //     'sub_kategori' => $sub_kategori,
        //     'harga'        => $harga,
        //     'ukuran'       => $ukuran,
        //     'harga_ukuran' => $harga_ukuran,
        //     // 'gambar'       => $nama_gambar_gabung,
        //     'keterangan'   => $keterangan 
        // );

        // print_r(json_encode($data));
    }

    /* END PRODUK */

    /* KATEGORI */

    function kategori(){
        $data['halaman'] = 'Kategori';
        $data['semua_kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('backend/kategori_produk', $data);
    }

    function tambah_kategori(){
        $data['halaman'] = 'Tambah Kategori';
        $this->load->view('backend/tambah_kategori_produk', $data);
    }

    function aksi_tambah_kategori(){
        $kategori = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $data = array(
            'kategori' => $kategori,
            'sub_kategori' => $sub_kategori 
        );
        $this->m_kategori->tambah('kategori', $data);
        redirect('admin/kategori');
    }
    function edit_kategori($id_kategori){
        $data['kategori'] = $this->m_kategori->tampil_kategori_id('kategori', array('id_kategori' => $id_kategori));
        $data['halaman'] = 'Edit Kategori';
        $this->load->view('backend/edit_kategori_produk', $data);
    }

    function aksi_edit_kategori(){
        $id_kategori  = $this->input->post('id_kategori');
        $kategori     = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');

        $data = array(
            'kategori'     => $kategori,
            'sub_kategori' => $sub_kategori 
        );

        $update = $this->m_kategori->edit('kategori', $data, array('id_kategori' => $id_kategori));
        if($update == true){
            redirect('admin/kategori');
        }

    }

    function hapus_kategori($id_kategori){
        $this->m_kategori->hapus('kategori', array('id_kategori' => $id_kategori));
        redirect('admin/kategori');
    }

    /* END KATEGORI */

    /* HALAMAN TES */

    function tes(){
        $data['halaman'] = 'Halaman tes';
        $this->load->view('backend/tes.php', $data);
    }

}

/* End of file Controllername.php */
