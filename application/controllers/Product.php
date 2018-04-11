<?php

class Product extends MY_Controller{
    function __construct(){
        parent::__construct();
        //load model
        $this->load->model('MProduct','mproduct');
        $this->load->model('MJenis');
      	$this->load->helper('form'); 
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
        $ar_jenis = array(0=>'- pilih -');
        $jenis_db = $this->MJenis->getJenis();
        $data['ar_jenis'] = array_merge($ar_jenis,$jenis_db);
       
        if($this->form_validation->run() == FALSE){
            $product = (object)array(
                    'nama_product'=>'','harga'=>'','deskripsi'=>'','id_jenis'=>0,'id_kategori'=>0);
            $data['product'] = $product;
            $data['kategori'] = array('-pilih kategori-');
            $data['action'] = 'product/add';
            $this->render('produk/form',$data);
        }else{
            // if($this->input->get()){
                $data = $this->input->post(array('nama_product','harga','deskripsi','id_kategori'));
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

    public function update($id){
        //cari data pada tabel produk, yang memiliki ID = $id
        $product = $this->mproduct->getById($id);
        //cari data kategori
        $this->load->model('MKategori');
        $kategori = $this->MKategori->getKategoriByJenis($product->id_jenis);
        //tampilkan data product pada from
        $ar_jenis = array(0=>'- pilih -');
        $jenis_db = $this->MJenis->getJenis();
        $data['ar_jenis'] = array_merge($ar_jenis,$jenis_db);
        $data['product'] = $product;
        $data['kategori'] = $kategori;
        $data['action'] = 'product/ubah';
        $this->render('produk/form',$data);
    }

}
