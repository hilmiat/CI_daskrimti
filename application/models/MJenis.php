<?php

class MJenis extends CI_Model{
    var $tbl_name = 'jenis';
    function getJenis(){
        $result = $this->db->get($this->tbl_name)->result();
        $data = array();
        foreach($result as $row){
            $data[$row->id_jenis] = $row->id_jenis.' | '.$row->nama_jenis;
        }
        return $data;
    }

}