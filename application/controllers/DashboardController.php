<?php


class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
        if ($data->role_id !== "1") {
            redirect('404_view'); // Arahkan ke halaman login jika belum login
        }
    }

    public function index(){

        // $query =  $this->PengungsiModel->jumlahDisabilitas();
        // echo $query;

        $dataDashboard = [
            'jumlahBencana' => $this->BencanaModel->jumlahBencana(),
            'jumlahPengungsi' => $this->PengungsiModel->jumlahPengungsi(),
            'jumlahPosko' => $this->PoskoModel->jumlahPosko(),
            'jumlahKorban' => $this->KorbanJiwaModel->jumlahKorban(),
            'jumlahDisabilitas' => $this->PengungsiModel->jumlahDisabilitas()
        ];

        $countKebutuhanPosko = $this->KebutuhanPoskoModel->countKebutuhanPosko();
        
       

       
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/index',[
            'dataDashboard' => $dataDashboard,
            'countKebutuhanPosko' => $countKebutuhanPosko
        ]);
        $this->load->view('dashboard/layout/footer');
       
        // $user = $this->AuthModel->getUser($this->session->userdata('user_id'));
        // $this->load->view('dashboard/layout/navbar');
		// $this->load->view('dashboard/index');
		// $this->load->view('dashboard/layout/footer');
    }

    
}