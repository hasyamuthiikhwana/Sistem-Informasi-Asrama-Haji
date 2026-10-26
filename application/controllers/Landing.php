<?php
class Landing extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'file']);
    }
    
    public function index() {
        $data['title'] = 'Home';
        $data['active'] = 'home';
        $this->load->view('layout/landing/header', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('layout/landing/footer');
    }
    
    public function fasilitas() {
        $data['title'] = 'Fasilitas';
        $data['active'] = 'fasilitas';
        $this->load->view('layout/landing/header', $data);
        $this->load->view('landing/fasilitas', $data);
        $this->load->view('layout/landing/footer');
    }
    
    public function tentang() {
        $data['title'] = 'Tentang Kami';
        $data['active'] = 'tentang';
        $this->load->view('layout/landing/header', $data);
        $this->load->view('landing/tentang', $data);
        $this->load->view('layout/landing/footer');
    }
    
    public function hubungi() {
        $data['title'] = 'Hubungi Kami';
        $data['active'] = 'hubungi';
        $this->load->view('layout/landing/header', $data);
        $this->load->view('landing/hubungi', $data);
        $this->load->view('layout/landing/footer');
    }
    
    public function login() {
        redirect('auth');
    }
}