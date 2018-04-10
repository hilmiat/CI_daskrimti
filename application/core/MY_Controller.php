<?php
class MY_Controller extends CI_Controller{
    public function render($view,$data=array()){
        $this->load->view('template/header');
        $this->load->view($view,$data);
        $this->load->view('template/footer');
        
    }
}