<?php

class Home extends MY_Controller{
    function __construct(){
        parent::__construct();
        //load model
        $this->load->model('Siswa');
    }
    public function index(){
       
       $data_siswa = $this->Siswa->getDataSiswa();
       $data['data_siswa'] = $data_siswa;
        $this->render('home/index',$data);
    }
    public function detail($id=-1){
        echo 'segmen ke-1 '.$this->uri->segment(1);
        echo ',segmen ke-2 '.$this->uri->segment(2);
        echo ',segmen ke-3 '.$this->uri->segment(3);
        if($id==-1){
            echo 'Anda tidak mengirimkan parameter';
        }else{
            $siswa = $this->Siswa->getByID($id);
            echo 'Detail siswa '.$siswa['nama'];
        }
    }
}