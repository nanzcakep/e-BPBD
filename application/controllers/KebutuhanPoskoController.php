<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KebutuhanPoskoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PoskoModel'); // Load the model
        $this->load->model('KebutuhanPoskoModel'); // Load the model
        $this->load->model('BuktiPengirimanModel'); // Load the model
        
    }


    public function index(){

        $posko  = $this->PoskoModel->getPosko();
        $kebutuhanPosko = $this->KebutuhanPoskoModel->getKebutuhanPosko();

        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/kebutuhan/index',[
            'data' => $posko->result(),
            'kebutuhanPosko' => $kebutuhanPosko
        ]);
        $this->load->view('dashboard/layout/footer');
    }

   
    public function detail($id_kebutuhan){
        
        if(!isset($_POST['update'])){
            $detailKebutuhanPosko = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
            $buktiPengiriman = $this->BuktiPengirimanModel->getBuktiByKebutuhan($id_kebutuhan);
            $getPosko = $this->PoskoModel->getPosko();
            $getDetailPosko = $this->PoskoModel->getDetailPosko($detailKebutuhanPosko->id_posko);
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('pages/kebutuhan/detail',[
                'kebutuhanPosko' => $detailKebutuhanPosko,
                'posko' => $getPosko->result(),
                'bukti' => $buktiPengiriman,
                'nama_posko' =>  $getDetailPosko
            ]);
            $this->load->view('dashboard/layout/footer');
        }else{
            $data = $this->input->post();

            $kebutuhan = [
                'id_posko' => $data['posko'],
                'jenis_kebutuhan' => $data['kebutuhan'],
                'jumlah' => $data['jumlah'],
                'status' =>  $data['status']
            ];

            $this->KebutuhanPoskoModel->updateDataKebutuhan($kebutuhan,$id_kebutuhan);
        }
            
    }

    public function tambah(){
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('posko', 'Posko', 'required');
        $this->form_validation->set_rules('kebutuhan', 'Jenis Kebutuhan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            // Validasi gagal, tampilkan pesan kesalahan
            $errors = $this->form_validation->error_array();
            $response['status'] = 'error';
            $response['message'] = 'Validasi gagal';
            $response['errors'] = $errors;
        } else {
            // Validasi berhasil, siapkan data kebutuhan dan simpan
            $data = $this->input->post();

            $kebutuhan = [
                'id_posko' => $data['posko'],
                'jenis_kebutuhan' => $data['kebutuhan'],
                'jumlah' => $data['jumlah'],
                'status' =>  "Dibutuhkan"
            ];

        

            $this->KebutuhanPoskoModel->createDataKebutuhan($kebutuhan);

            $response['status'] = 'success';
            $response['message'] = 'Kebutuhan berhasil ditambahkan';
    }

        echo json_encode($response);

    }

    public function delete($id_kebutuhan = NULL){
        $this->KebutuhanPoskoModel->deleteDataKebutuhan($id_kebutuhan);
    }

    // public function tambah() {
    //     $data = $this->input->post();

    //     $kebutuhan = [
    //         'id_posko' => $data['id_posko'],
    //         'jenis_kebutuhan' => $data['jenis_kebutuhan'],
    //         'jumlah' => $data['jumlah'],
    //         'status' => 'Dibutuhkan'
    //     ];
    
            
    
       
    // }
}