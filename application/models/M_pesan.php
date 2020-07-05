<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model {

	function tambah_pesan($data) {

		$this->db->insert('beli', $data);
         $sukses = $this->db->affected_rows();

         if ($sukses) {

            $last_id = $this->db->insert_id();
            return $inserted_data = $this->db->get_where('beli', array('id' => $last_id))->result();

         } else {

            return false;
         
         }

	}

}