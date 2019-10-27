<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    function tampil(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           produk.ukuran,
                           produk.harga_ukuran,
                           produk.keterangan,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_limit(){
        $this->db->select('produk.*, kategori.*');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->limit('5');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_kategori_1(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->where('produk.id_kategori=1');
        $this->db->limit('5');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_kategori_2(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->where('produk.id_kategori=2');
        $this->db->limit('4');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_kategori_3(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->where('produk.id_kategori=3');
        $this->db->limit('4');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_kategori_4(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->where('produk.id_kategori=4');
        $this->db->limit('4');
        $this->db->order_by('produk.id_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function tampil_perid($id){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_kategori', $id);
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }

    function tampil_detail($id){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        // $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }

    function tampil_subkategori($sub_kategori){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('sub_kategori', $sub_kategori);
        // $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }

    function tampil_search($search){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
                           produk.gambar,
                           kategori.id_kategori,
                           kategori.kategori');
        $this->db->from('produk, kategori');
        $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->like('nama_produk', $search);
        // $this->db->like('sub_kategori', $search);
        // $this->db->like('kategori', $search);
        // $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }

    function tambah($table, $data){
        return $this->db->insert($table, $data);
    }

    function hapus($table, $where){
        $data = $this->tampil_detail($where['id_produk']);
        $gambar_pecah = explode(',', $data[0]->gambar);
        foreach($gambar_pecah as $gp){
            unlink("./assets/gambar/".$gp);
        }
        return $this->db->delete($table, $where);
    }

}

/* End of file M_produk.php */
