<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    function tampil_kategori(){
        return $this->db->get('kategori')->result();
    }

    function tambah($table, $data){
        return $this->db->insert($table, $data);
    }

    function tampil_kategori_id($table, $where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    function edit($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    function hapus($table, $where){
        return $this->db->delete($table, $where);
    }

}

/* End of file M_kategori.php */
