<?php

class Product extends MY_Controller{
    function __construct(){
        parent::__construct();
        //load model
        $this->load->model('MProduct','mproduct');
        $this->load->model('MJenis');
       
    }
    public function index(){
        $data_produk = $this->mproduct->getAllProduct();
        $data['data_produk'] = $data_produk;
        $this->render('produk/index',$data);
    }
    public function hapus_produk($id){
        $this->mproduct->hapus($id);
        redirect('Product/index');
    }
    public function detail($id){
        //cari produk di database
        $produk = $this->mproduct->getById($id);
        $this->render('produk/detail',array('produk'=>$produk));
    }
    public function add(){
        // $nama_product = $_GET['nama_product'];               //get input dgn name nama_product
        // $nama_product = $this->input->get('nama_product');   //get input dgn name nama_product
        // $data = $this->input->get();                         //get all input
        // $this->form_validation->set_rules('harga','Harga','required | max_length[45] | min_length[2]');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_product','Nama Produk','is_unique[product.nama_product]');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');

        $data['ar_jenis'] = $this->MJenis->getJenis();

        if($this->form_validation->run() == FALSE){
            $this->render('produk/form',$data);
        }else{
            // if($this->input->get()){
                $data = $this->input->get(array('nama_product','harga','deskripsi'));
                $this->mproduct->simpan($data);
                redirect('product');
            // }
        }
       
        // $this->render('produk/form');
    }
    function cari_kategori($id_jenis){
        $this->load->model('MKategori');
        $kategori = $this->MKategori->getKategoriByJenis($id_jenis);
        echo json_encode($kategori);
    }
}
