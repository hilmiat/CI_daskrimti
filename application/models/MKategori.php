<?php

class MKategori extends CI_Model{
    var $tbl_name = 'kategori';
    function getKategoriByJenis($id_jenis){
        $result = $this->db->get_where(
                $this->tbl_name,
                array('id_jenis'=>$id_jenis)
            )->result();
        $data = array();
        foreach($result as $row){
            $data[$row->id_kategori] = $row->nama_kategori;
        }
        return $data;
    }

}