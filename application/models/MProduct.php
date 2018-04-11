<?php

class MProduct extends CI_Model{
    var $tbl_name = 'product';
    function getAllProduct(){
        // $this->load->database('default');
        // $sql = "SELECT * FROM produk";
        $this->db->select('*');
        $this->db->from($this->tbl_name);
        return $this->db->get()->result();
        // return $this->db->get('produk')->result();
    }
    function hapus($id){
        // $this->db->where('id',$id);
        // $this->db->delete($this->tbl_name);
        $this->db->delete($this->tbl_name,array('id'=>$id));
    }
    function getById($id){
        // $this->db->where('id',$id);
        // return $this->db->get($this->tbl_name)->row();
        // return $this->db
        // ->get_where($this->tbl_name,array('id'=>$id))->row();
        $this->db->select('*');
        $this->db->from($this->tbl_name);
        $this->db->join('kategori','product.id_kategori = kategori.id_kategori');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }
    function simpan($data){
        $this->db->insert($this->tbl_name,$data);
    }


}