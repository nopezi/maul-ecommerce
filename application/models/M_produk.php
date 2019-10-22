<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    function tampil(){
        $this->db->select('produk.*, kategori.*');
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

    function tambah($table, $data){
        return $this->db->insert($table, $data);
    }

}

/* End of file M_produk.php */
