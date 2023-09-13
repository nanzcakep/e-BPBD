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

        $dataDashboard = [
            'jumlahBencana' => $this->BencanaModel->jumlahBencana(),
            'jumlahPengungsi' => $this->PengungsiModel->jumlahPengungsi(),
            'jumlahPosko' => $this->PoskoModel->jumlahPosko(),
        ];
        
       

       
        $this->load->view('pages/layout-user/navbar');
        $this->load->view('pages/dashboard/index',[
            'dataDashboard' => $dataDashboard
        ]);
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
            $pengungsi = $this->PengungsiModel->getPengungsiByPosko($id_posko);
            $kebutuhan = $this->KebutuhanPoskoModel->getKebutuhanByPoskoId($id_posko);
            $countBalita = $this->PengungsiModel->countBalita();
            $countDewasa = $this->PengungsiModel->countDewasa();
            $countOrangTua = $this->PengungsiModel->countOrangTua();
            $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/detail-posko', [
                'posko' => $posko,
                'kebutuhan' => $kebutuhan,
                'pengungsi' => $pengungsi,
                'countBalita' => $countBalita,
                'countDewasa' => $countDewasa,
                'countOrangTua' => $countOrangTua
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
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
            if ($this->form_validation->run() === false) {
                // Validasi gagal, tampilkan halaman donasi dengan pesan kesalahan
                $this->session->set_flashdata('error_message', 'Gagal menambahkan donasi '.validation_errors());
                redirect('dashboard/donasi/'.$id_kebutuhan);
            } else {
                $config['upload_path'] = 'public/donasi/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048; // Ukuran maksimal dalam kilobita
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti')) {
                    $uploadError = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message', 'Tolong upload buktinya');
                    redirect('dashboard/donasi/'.$id_kebutuhan);
                }
                $uploadData = $this->upload->data();
                $filePath = 'public/donasi/' . $uploadData['file_name'];
                $data = $this->input->post();
                $tanggal = date('Y-m-d', strtotime($data['tanggal']));
                $donasiField = [
                    'id_kebutuhan' => $kebutuhan->id_kebutuhan,
                    'tanggal_pengiriman' => $tanggal,
                    'bukti' => $filePath,
                    'keterangan' => $data['keterangan'],
                    'status' => 'Terkirim',
                    'user_id' => $this->session->userdata('user_id')
                ];

                $this->BuktiPengirimanModel->createDonasi($donasiField);

                $this->session->set_flashdata('success_message', 'Terima kasih telah berdonasi semoga anda masuk surga');
                redirect('dashboard/histori-donasi');
        }
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

    public function getAllBencana(){
        $bencana = $this->BencanaModel->getBencana(); // Call the getMobil method from the model
        $this->load->view('pages/layout-user/navbar');
        $this->load->view('pages/dashboard/bencana',[
            'data' => $bencana,
        ]); 
        $this->load->view('pages/layout-user/footer');
    }

    public function getDetailBencana($id_bencana = NULL){
        try {
            $bencana = $this->BencanaModel->getDetailBencana($id_bencana);
            $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/detail-bencana',[
                'data' => $bencana,
            ]); 
            $this->load->view('pages/layout-user/footer');
        } catch (Exception $e) {
            redirect('404_views');
        }
    }

    public function detailDonasi($id_pengiriman){
        $detailDonasi  = $this->KebutuhanPoskoModel->getDetailDonasi($id_pengiriman);
       
        $user =  $this->session->userdata('user_id');

        if ($detailDonasi->user_id === $user){
            $this->load->view('pages/layout-user/navbar');
            $this->load->view('pages/dashboard/detail-donasi',[
                'detailDonasi' => $detailDonasi
            ]); 
            $this->load->view('pages/layout-user/footer');
        }else{
            redirect('404_views');
        }
        
    }
}