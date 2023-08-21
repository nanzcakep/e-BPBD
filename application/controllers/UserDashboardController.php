<?php
class UserDashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('PoskoModel'); // Load the model
        $this->load->model('BencanaModel');
        $this->load->model('PengungsiModel');
        $this->load->model('KebutuhanPoskoModel');
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
        if ($data->role_id !== "2") {
            redirect('404_view'); // Arahkan ke halaman login jika belum login
        }

    }


    public function index(){
        $this->load->view('pages/layout-user/navbar');
        $this->load->view('pages/dashboard/index');
        $this->load->view('pages/layout-user/footer');
    }

    public function getAllPosko(){
        $posko = $this->PoskoModel->getPosko()->result();
        $this->load->view('pages/layout-user/navbar');
        $this->load->view('pages/dashboard/posko',[
            'data' => $posko
        ]);
        $this->load->view('pages/layout-user/footer');
        
    }

    public function getDetailPosko($id_posko = NULL){
        try {
            $posko = $this->PoskoModel->getPoskoWithBencana($id_posko);
            $kebutuhan = $this->KebutuhanPoskoModel->getKebutuhanByPoskoId($id_posko);
            $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/detail-posko', [
                'posko' => $posko,
                'kebutuhan' => $kebutuhan
            ]);
            $this->load->view('pages/layout-user/footer');
        } catch (Exception $e) {
            redirect('404_views');
        }
    }

    public function donasi($id_kebutuhan = NULL){
        $kebutuhan = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
        if(!isset($_POST['donasi'])){ 
            $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/donasi',[
                'kebutuhan' => $kebutuhan
            ]);
            $this->load->view('pages/layout-user/footer');
        }else{
            $data = $this->input->post();
            $tanggal = date('Y-m-d', strtotime($data['tanggal']));
            $donasiField = [
                'id_kebutuhan' => $kebutuhan->id_kebutuhan,
                'tanggal_pengiriman' => $tanggal,
                'bukti' => $data['bukti'],
                'keterangan' => $data['keterangan'],
                'status' => 'Terkirim',
                'user_id' => $this->session->userdata('user_id')
            ];

            $this->BuktiPengirimanModel->createDonasi($donasiField);

            echo "Terima kasih sudah berdonasi semoga masuk surga amin";
        }
    }

    public function getHistoriDonasi(){
       $data =  $this->BuktiPengirimanModel->getHistoryUser($this->session->userdata('user_id'));
       $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/histori-donasi',[
                'histories' => $data
            ]);
        $this->load->view('pages/layout-user/footer');
      
    }
}