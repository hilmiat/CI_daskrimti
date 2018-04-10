<?php

class Siswa extends CI_Model{
     private $data_siswa = array(
        array('nama'=>'Adi','alamat'=>'Bogor'),
        array('nama'=>'Ade','alamat'=>'Depok'),
        array('nama'=>'Adu','alamat'=>'Jakarta'),
    );
    public function getDataSiswa(){
        return $this->data_siswa;
    }
    public function getByID($id){
       return $this->data_siswa[$id];
    }
}