<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_kategori');
        $this->load->model('m_produk');
        $this->load->model('m_slide');
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
        $warna        = $this->input->post('warna');
        $foto         = $this->input->post('file');

        $harga_ukuran = implode(',', $harga_ukuran);
        $ukuran = implode(',', $ukuran);

        $gambar = $_FILES['file'];

        // for($i=0; $i<sizeof($gambar['name']); $i++){
        //     // echo $data_gambar['name'][$i].'<br>';
        //     unlink("./assets/gambar/".$data_gambar['name'][$i]);
        // }

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
                    $data_gambar[] = array('upload_data' => $this->upload->data());
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

            // print_r(json_encode($nama_gambar));
            // $nama_gambar_gabung = implode(',', $nama_gambar);

            $data = array(
                'nama_produk'  => $nama_produk,
                'id_kategori'  => $kategori,
                'sub_kategori' => $sub_kategori,
                'harga'        => $harga,
                'warna'        => $warna,
                'ukuran'       => $ukuran,
                'harga_ukuran' => $harga_ukuran,
                'keterangan'   => $keterangan 
            );

            $result = $this->m_produk->tambah($data);

            foreach($data_gambar as $dt){
                $data_gambar = [
                    'id_produk' => $result[0]->id_produk,
                    'gambar'    => $dt['upload_data']['file_name'],
                ];
                $gambar = $this->m_produk->tambah_gambar($data_gambar);
                $nama_gambar[] = $dt['upload_data']['file_name'];
            }

            // echo $result;
            // print_r(json_encode($data));
            if($gambar) {
                redirect('admin/produk');
            } else {

            }
        }else{
            $error = 'kosong';
            $this->session->set_flashdata('gagal', $error);
            redirect(base_url('admin/tambah_produk'));
        }
    }

    function edit_produk($id){

        $data['halaman']  = 'Edit Produk';
        $data['ukuran']   = $this->db->get_where('ukuran', array('id_produk' => $id))->result();
        $data['produk']   = $this->m_produk->tampil($id, null,null);
        $data['kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('backend/edit_produk', $data);
        // echo '<pre>';
        // print_r($data['produk']);
    }

    function aksi_edit_produk($id_produk_awal){
        $nama_produk  = $this->input->post('nama_produk');
        $id_produk    = $this->input->post('id_produk');
        $id_kategori  = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $keterangan   = $this->input->post('keterangan');
        $harga        = $this->input->post('harga');
        $id_ukuran    = $this->input->post('id_ukuran');
        $ukuran       = $this->input->post('ukuran');
        $harga_ukuran = $this->input->post('harga_ukuran');
        $file2        = $this->input->post('file');

        if(!empty($_FILES['file'])) {  

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
                    $data_gambar[] = array('upload_data' => $this->upload->data());
                    // $data[$i] = $this->upload->data();
                    // echo '<pre>';
                    // print_r($data);
                    // echo '<pre>';
                    // echo $data[];
                }else{
                    // $error = array('error' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    $data2[] = $file2[$i];
                    // $this->session->set_flashdata('gagal', $error);
                    // redirect(base_url('admin/tambah_produk'));
                } 
                 
            }

            if (!empty($data_gambar)) {
                foreach($data_gambar as $dt){
                    $nama_gambar[] = $dt['upload_data']['file_name'];
                    $id_produk = $this->m_produk->edit_gambar($dt['upload_data']['file_name'], $id_produk);
                }
            } else {
                $cek_gambar = $this->db->get_where('gambar', array('id_produk' => $id_produk_awal))->result();
                if(empty($cek_gambar)) {
                    $this->session->set_flashdata('edit_data', 'foto_kosong');
                    redirect('admin/edit_produk/'.$id_produk_awal);
                }
            }

            
        }

        $data_produk = [
            'nama_produk'  => $nama_produk,
            'id_kategori'  => $id_kategori,
            'sub_kategori' => $sub_kategori,
            'harga'        => $harga,
            'keterangan'   => $keterangan
        ];

        $hasil_edit_produk = $this->m_produk->edit_produk($data_produk, $id_produk_awal);
        // echo $id_produk;
        // $data = [
        //     'nama_produk'  => $nama_produk,
        //     'id_kategori'  => $id_kategori,
        //     'sub_kategori' => $sub_kategori,
        //     'harga'        => $harga,
        //     'keterangan'   => $keterangan,
        //     'id_produk' => $id_produk,
        //     'ukuran'    => $ukuran,
        //     'harga_ukuran'     => $harga_ukuran,
        // ];
        // echo "<pre>";
        // print_r($data);

        for ($y=0; $y < sizeof($ukuran); $y++) { 
            $data_ukuran = [
                'id_produk' => $id_produk_awal,
                'ukuran'    => $ukuran[$y],
                'harga'     => $harga_ukuran[$y],
            ];
            if(!empty($id_ukuran[$y])) {
                $this->db->update('ukuran', $data_ukuran, array('id' => $id_ukuran[$y]));
            } else {
                $this->db->insert('ukuran', $data_ukuran);
            }
        }
        

        if(!empty($ukuran)) {
            $this->session->set_flashdata('edit_data', 'berhasil');
            redirect('admin/edit_produk/'.$id_produk_awal);
        } else {
            $this->session->set_flashdata('edit_data', 'gagal');
            redirect('admin/edit_produk/'.$id_produk_awal);
        }

    }

    function hapus_produk(){
        $id_produk = $this->input->post('id_produk');

        $data = $this->db->get_where('gambar',array('id_produk' => $id_produk))->result();
        if(!empty($data)) {

          foreach($data as $gp){
              unlink("./assets/gambar/".$gp->gambar);
          }

        }
        
        $this->db->delete('produk', array('id_produk' => $id_produk));
        $this->db->delete('gambar', array('id_produk' => $id_produk));

        // $hasil = $this->m_produk->hapus('produk', $id_produk);
        // if($hasil == true){
            redirect('admin/produk');
        // }
    }

    function hapus_ukuran() {
        $id_ukuran = $this->input->get('id_ukuran');
        $this->db->delete('ukuran', array('id' => $id_ukuran));
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

    /* GAMBAR HEADER */
    
    public function slide(){
        $data['halaman'] = 'Slider';
        $data['slide']   = $this->m_slide->tampil();
        // $data['semua_kategori'] = $this->m_kategori->tampil_kategori();
        $this->load->view('backend/slider', $data);
    }

    public function tambah_slide(){
        $data['halaman'] = 'Tambah Slide';
        $data['slide']   = $this->m_slide->tampil();
        $this->load->view('backend/tambah_slider', $data);
    }

    public function aksi_tambah_slide(){

        if($_FILES['gambar']){

            $number_of_files = sizeof($_FILES['gambar']['tmp_name']);  
            $files = $_FILES['gambar'];  
            $config=array(  
            'upload_path' => './assets/gambar/', //direktori untuk menyimpan gambar  
            'allowed_types' => 'jpg|jpeg|png|gif',
            'min-width' => '1600',
            'min-height' => '707',  
            // 'max_size' => '2000',  
            // 'max_width' => '2000',  
            // 'max_height' => '2000',
            'encrypt_name' => TRUE  
            );
              
                $_FILES['file']['name'] = $files['name'];  
                $_FILES['file']['type'] = $files['type'];  
                $_FILES['file']['tmp_name'] = $files['tmp_name'];  
                $_FILES['file']['error'] = $files['error'];  
                $_FILES['file']['size'] = $files['size'];  
                $this->load->library('upload', $config);  
                if($this->upload->do_upload('file')){
                    $data[] = array('upload_data' => $this->upload->data());
                    // $data[$i] = $this->upload->data();
                    // echo '<pre>';
                    // print_r($data);
                    // echo '<pre>';
                    $gambar = $data[0]['upload_data']['file_name'];
                    $data = array('gambar' => $gambar);
                    $this->m_slide->tambah($data);
                    redirect(base_url('admin/slide'));
                }else{
                    // $error = array('error' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    // echo '<pre>';
                    // print_r($error);
                    // echo $error;
                    // echo '<pre>';
        
                    $this->session->set_flashdata('gagal', $error);
                    redirect(base_url('admin/slide'));
                } 
        }

        
        
    }

    public function aksi_edit_slide(){

        if($_FILES['gambar']){
            $id_slide = $this->input->post('id_slide');
            $number_of_files = sizeof($_FILES['gambar']['tmp_name']);  
            $files = $_FILES['gambar'];  
            $config=array(  
            'upload_path' => './assets/gambar/', //direktori untuk menyimpan gambar  
            'allowed_types' => 'jpg|jpeg|png|gif',
            'min-width' => '1600',
            'min-height' => '707',  
            // 'max_size' => '2000',  
            // 'max_width' => '2000',  
            // 'max_height' => '2000',
            'encrypt_name' => TRUE  
            );
              
                $_FILES['file']['name'] = $files['name'];  
                $_FILES['file']['type'] = $files['type'];  
                $_FILES['file']['tmp_name'] = $files['tmp_name'];  
                $_FILES['file']['error'] = $files['error'];  
                $_FILES['file']['size'] = $files['size'];  
                $this->load->library('upload', $config);  
                if($this->upload->do_upload('file')){
                    $data[] = array('upload_data' => $this->upload->data());
                    // $data[$i] = $this->upload->data();
                    echo '<pre>';
                    print_r($data);
                    echo '<pre>';
                    $gambar = $data[0]['upload_data']['file_name'];
                    $data = array('gambar' => $gambar);
                    $this->m_slide->edit($data, array('id_slide' => $id_slide));
                    redirect(base_url('admin/slide'));
                }else{
                    // $error = array('error' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    // echo '<pre>';
                    // print_r($error);
                    // echo $error;
                    // echo '<pre>';
        
                    $this->session->set_flashdata('gagal', $error);
                    redirect(base_url('admin/slide'));
                } 
        }

        
        
    }

    function hapus_slide(){
        $id_slide = $this->input->post('id_slide');
        $data     = array('id_slide' => $id_slide);
        $hasil    = $this->m_slide->hapus('gambar_slide',$id_slide);
        // // print_r($hasil);
        // echo $hasil;
        if($hasil == true){
            redirect('admin/slide');
        }
    }

    /* GAMBAR HEADER */

    function tampil_gambar(){
        $id = $this->input->get('id_produk');
        $gambar = $this->db->get_where('gambar', array('id_produk' => $id))->result_array();

        $tampil = '';
        
        if(!empty($gambar)) {

            foreach ($gambar as $g) {
                $tampil .= '<div class="col-xs-6 col-md-3">';
                $tampil .= '<a type="button" data-toggle="modal" class="thumbnail" data-target=".bs-example-modal-sm-hapus'.$g['id'].'">';
                $tampil .= '<img src="'.base_url().'assets/gambar/'.$g['gambar'].'" class="img-responsive img-rounded">';
                $tampil .= '</a></div>';
            }

        }

        if(!empty($tampil)) {
            print_r($tampil);
        }
    }

    function hapus_gambar(){

        $id_gambar = $this->input->get('id_gambar');
        $gambar = $this->db->get_where('gambar', array('id' => $id_gambar))->result();

        $this->db->delete('gambar', array('id' => $id_gambar));
        $cek_gambar = $this->db->get_where('gambar', array('id' => $id_gambar))->result();

        if(empty($cek_gambar)) {

            unlink("./assets/gambar/".$gambar[0]->gambar);
            $hasil = ['status' => true];

            print_r($hasil);

        } else {
            
            $hasil = ['status' => false];
            print_r($hasil);

        }

    }

    function pembeli(){
        $data['halaman'] = 'Pembeli';
        $this->db->order_by('id', 'desc');
        $data['data_pembeli'] = $this->db->get('beli')->result();
        $this->load->view('backend/pembeli', $data);
    }

    /* HALAMAN TES */

    function tes(){

        if(!empty($this->input->post('nama')))  
        {  
            echo '<pre>';
            print_r($_FILES['file']);

        } else {

            $this->load->view('backend/tes');

        }

    }

}

/* End of file Controllername.php */
