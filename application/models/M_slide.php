<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slide extends CI_Model {

    function tampil(){
        $this->db->select('*');
        $this->db->from('gambar_slide');
        return $this->db->get()->result();
    }

    function tambah($data){
        return $this->db->insert('gambar_slide', $data);
    }

    function edit($data, $where){
        return $this->db->update('gambar_slide', $data, $where);
    }

}

/* End of file M_slide.php */
