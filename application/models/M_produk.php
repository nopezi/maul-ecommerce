<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    function tampil($id = null, $sub_kategori = null, $id_kategori = null){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori','kategori.id_kategori=produk.id_kategori');
        $this->db->order_by('produk.id_kategori', 'DESC');

        if(!empty($id)) {
          $this->db->where('produk.id_produk', $id);
        } else if(!empty($sub_kategori)) {
          $this->db->like('produk.sub_kategori', $sub_kategori, 'both');  
        } else if(!empty($id_kategori)) {
          $this->db->where('produk.id_kategori', $id_kategori);  
        }

        

        $produk = $this->db->get()->result();

        foreach ($produk as $p) {
          
            $gambar = $this->db->get_where('gambar', array('id_produk'=>$p->id_produk))->result();

            if(!empty($gambar)) {

              foreach ($gambar as $g) {
                  
                  $p->id_foto[] = $g->id;
                  $p->foto[] = $g->gambar;
              
              }

            } else {

              $p->foto = null;

            }

        }

        return $produk;
    }

    function tampil_limit(){
        $this->db->select('*');
        $this->db->from('produk');
        // $this->db->where('produk.id_kategori=kategori.id_kategori');
        $this->db->join('kategori','kategori.id_kategori=produk.id_kategori');
        $this->db->limit('20');
        $this->db->order_by('produk.id_kategori', 'DESC');
        return $this->db->get()->result();
    }

    function tampil_perkategori() {

      $kategori = $this->db->get('kategori')->result();

      foreach ($kategori as $k) {
         
         $produk = $this->db->get_where('produk', array('id_kategori' => $k->id_kategori))->result();

         foreach($produk as $p){
            $gambar = $this->db->get_where('gambar', array('id_produk' => $p->id_produk))->result();
            $p->foto = $gambar[0]->gambar;
         }

          $k->data_produk = $produk;

      }

      return $kategori;

    }

    function tampil_kategori_1(){
        $this->db->select('produk.id_produk, 
                           produk.id_kategori, 
                           produk.nama_produk,
                           produk.sub_kategori,
                           produk.harga,
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

      $this->db->select('*');
      $this->db->from('produk');
      $this->db->join('kategori','kategori.id_kategori=produk.id_kategori');
      $this->db->order_by('produk.id_kategori', 'DESC');

      if(!empty($search)) {
        $this->db->like('produk.nama_produk', $search, 'both');  
      }

      

      $produk = $this->db->get()->result();

      foreach ($produk as $p) {
        
          $gambar = $this->db->get_where('gambar', array('id_produk'=>$p->id_produk))->result();

          if(!empty($gambar)) {

            foreach ($gambar as $g) {
            
                $p->foto[] = $g->gambar;
            
            }

          } else {

            $p->foto = null;

          }

      }

      return $produk;
    }

    function tambah($data){
         $this->db->insert('produk', $data);
         $sukses = $this->db->affected_rows();

         if ($sukses) {

            $last_id = $this->db->insert_id();
            return $inserted_data = $this->db->get_where('produk', array('id_produk' => $last_id))->result();

         } else {

            return false;
         
         }
    }

    function tambah_gambar($data){
         $this->db->insert('gambar', $data);
         $sukses = $this->db->affected_rows();

         if ($sukses) {

            $last_id = $this->db->insert_id();
            return $inserted_data = $this->db->get_where('gambar', array('id' => $last_id))->result();

         } else {

            return false;
         
         }
    }

    function edit_produk($data, $id_produk){
        $this->db->set($data)
                 ->where('id_produk', 8)
                 ->update('produk');
         // $this->db->update('produk', $data, array('id_produk' => $id_produk));
         $sukses = $this->db->affected_rows();

         if ($sukses) {

            $last_id = $this->db->insert_id();
            return $inserted_data = $this->db->get_where('produk', array('id_produk' => $id_produk))->result();

         } else {

            return false;
         
         }
    }

    function edit_gambar($gambar, $id_produk){
       $data = $this->db->get_where('gambar',['id_produk' => $id_produk])->result();

       // foreach($data as $gp){
       //    unlink("./assets/gambar/".$gp->gambar);
       // }

       // $this->db->delete('gambar', ['id_produk' => $id_produk]);

       $data_gambar = [
            'id_produk' => $id_produk,
            'gambar'    => $gambar,
       ];

       $this->db->insert('gambar', $data_gambar);
       $sukses = $this->db->affected_rows();

       if ($sukses) {

          $last_id = $this->db->insert_id();
          return $inserted_data = $this->db->get_where('gambar', array('id' => $last_id))->result();

       } else {

          return false;
       
       }
    }

    function hapus($id_produk){
        $data = $this->db->get_where('gambar',array('id_produk' => $id_produk))->result();
        // $gambar_pecah = explode(',', $data[0]->gambar);
        // print_r($data);
        if(!empty($data)) {

          foreach($data as $gp){
              unlink("./assets/gambar/".$gp->gambar);
          }

        }

        $this->db->delete('gambar', array('id_produk' => $id_produk));
        return $this->db->delete('produk', array('id_produk' => $id_produk));
    }

}

/* End of file M_produk.php */
