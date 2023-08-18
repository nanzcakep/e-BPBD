<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengungsiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PengungsiModel');
    }

    public function index(){
        $pengungsi = $this->PengungsiModel->getPengungsiAndPosko();
        
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('pages/pengungsi/pengungsi',[
            'data' => $pengungsi,
            'title' => 'Data Pengungsi'
        ]);
        $this->load->view('dashboard/layout/footer');
    }

    public function detail($id_pengungsi = NULL){
        try {
            $pengungsi = $this->PengungsiModel->getDetailPengungsi($id_pengungsi);
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('pages/pengungsi/detail',[
                'data' => $pengungsi,
                'title' => 'Detail Pengungsi'
            ]);
            $this->load->view('dashboard/layout/footer');
        } catch (Exception $e) {
            redirect('404_views');
        }
    }
}