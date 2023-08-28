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
            $this->load->view('dashboard/kebutuhan/donasi',[
                'data' => $kebutuhan
            ]);
            $this->load->view('dashboard/layout/footer');

        }else{
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() === false) {
                // Validasi gagal, tampilkan halaman donasi dengan pesan kesalahan
                $this->session->set_flashdata('error_message', 'Gagal menambahkan donasi '.validation_errors());
                redirect('admin/dashboard/donasi/'.$id_kebutuhan);
            } else {
                $config['upload_path'] = 'public/donasi/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048; // Ukuran maksimal dalam kilobita
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti')) {
                    $uploadError = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message', 'Tolong upload buktinya');
                    redirect('admin/dashboard/donasi/'.$id_kebutuhan);
                }
                $uploadData = $this->upload->data();
                $filePath = 'public/donasi/' . $uploadData['file_name'];

                $data = $this->input->post();
                $tanggal = date('Y-m-d', strtotime($data['tanggal']));
                $donasiField = [
                    'id_kebutuhan' => $kebutuhan->id_kebutuhan,
                    'tanggal_pengiriman' => $tanggal,
                    'bukti' =>  $filePath,
                    'keterangan' => $data['keterangan'],
                    'status' => 'Terkirim',
                    'user_id' => 1
                ];

                $this->BuktiPengirimanModel->createDonasi($donasiField);
                $this->session->set_flashdata('success_message', 'Data donasi berhasil ditambahkan');
                redirect('admin/dashboard/kebutuhan-posko/detail/'.$id_kebutuhan);

                
        
            }
        }

        // $kebutuhan = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
        // if(!isset($_POST['donasi'])){ 
        //     $this->load->view('dashboard/layout/navbar');
        //     $this->load->view('dashboard/kebutuhan/donasi',[
        //         'data' => $kebutuhan
        //     ]);
        //     $this->load->view('dashboard/layout/footer');
        // }else{
        //     $data = $this->input->post();
        //     $tanggal = date('Y-m-d', strtotime($data['tanggal']));
        //     $donasiField = [
        //         'id_kebutuhan' => $kebutuhan->id_kebutuhan,
        //         'tanggal_pengiriman' => $tanggal,
        //         'bukti' => $data['bukti'],
        //         'keterangan' => $data['keterangan'],
        //         'status' => 'Terkirim'
        //     ];

        //     $this->BuktiPengirimanModel->createDonasi($donasiField);
        //     $this->session->set_flashdata('success_message', 'Terima kasih telah berdonasi semoga anda masuk surga');
        //     redirect('dashboard/histori-donasi');
        // }

    }

    public function update($id_pengiriman){
        $detailDonasi = $this->BuktiPengirimanModel->detailDonasi($id_pengiriman);
        if(!isset($_POST['update'])){
            if($detailDonasi){
                $this->load->view('dashboard/layout/navbar');
                $this->load->view('dashboard/kebutuhan/update-donasi',[
                     "data" => $detailDonasi,
                 ]);
                 $this->load->view('dashboard/layout/footer'); 
            }else{
                redirect('404_views');
            }
        }else{
            $dataDonasi = [
                'id_pengiriman' => $detailDonasi->id_pengiriman,
                'id_kebutuhan' => $detailDonasi->id_kebutuhan,
                'tanggal_pengiriman' => $detailDonasi->tanggal_pengiriman,
                'bukti' => $detailDonasi->bukti,
                'keterangan' => $detailDonasi->keterangan,
                'status' => $this->input->post('status'),
                'user_id' => $detailDonasi->user_id
            ];

            $this->BuktiPengirimanModel->updateDonasi($id_pengiriman,$dataDonasi);
            $this->session->set_flashdata('success_message', 'Status donasi berhasil diubah');
            redirect('admin/dashboard/donasi/detail/'.$detailDonasi->id_pengiriman);
        }
    }
  
    
}