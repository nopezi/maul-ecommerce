<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slide extends CI_Model {

    function tampil(){
        $this->db->select('*');
        $this->db->from('gambar_slide');
        return $this->db->get()->result();
    }

    function tampil_detail($id){
        $this->db->select('*');
        $this->db->from('gambar_slide');
        $this->db->where('id_slide', $id);
        return $this->db->get()->result();
    }

    function tambah($data){
        return $this->db->insert('gambar_slide', $data);
    }

    function edit($data, $where){
        return $this->db->update('gambar_slide', $data, $where);
    }

    function hapus($table, $id){
        $data = $this->tampil_detail($id);
        // $gambar_pecah = explode(',', $data[0]->gambar);
        // foreach($gambar_pecah as $gp){
            unlink("./assets/gambar/".$data[0]->gambar);
        // }
        return $this->db->delete($table, array('id_slide' => $id));
    }

}

/* End of file M_slide.php */
