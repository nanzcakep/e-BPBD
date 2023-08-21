<?php

class DonasiController extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('PoskoModel'); // Load the model
        $this->load->model('BencanaModel');
        $this->load->model('PengungsiModel');
        $this->load->model('KebutuhanPoskoModel');
        $this->load->model('BuktiPengirimanModel');
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
        if ($data->role_id !== "1") {
            redirect('404_view'); // Arahkan ke halaman login jika belum login
        }
        
    }

    public function index(){
       $posko = $this->PoskoModel->getPosko();
       
       $this->load->view('dashboard/layout/navbar');
       $this->load->view('pages/donasi/index',[
            "data" => $posko,
            "title" => 'Donasi Disini',
        ]);
        $this->load->view('dashboard/layout/footer'); 
    // $data['posko_kebutuhan'] = $this->PoskoModel->getPoskoWithKebutuhan();
    // $this->load->view('pages/donasi/index', $data);
    }

    

    public function donasi($id_kebutuhan = NULL){
        $kebutuhan = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
        if(!isset($_POST['donasi'])){ 
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('pages/donasi/donasi',[
                'data' => $kebutuhan
            ]);
            $this->load->view('dashboard/layout/footer');
        }else{
            $data = $this->input->post();
            $tanggal = date('Y-m-d', strtotime($data['tanggal']));
            $donasiField = [
                'id_kebutuhan' => $kebutuhan->id_kebutuhan,
                'tanggal_pengiriman' => $tanggal,
                'bukti' => $data['bukti'],
                'keterangan' => $data['keterangan'],
                'status' => 'Terkirim'
            ];

            $this->BuktiPengirimanModel->createDonasi($donasiField);

            echo "Terima kasih sudah berdonasi semoga masuk surga amin";
        }

    }
}