<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KebutuhanPoskoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('PoskoModel'); // Load the model
        $this->load->model('KebutuhanPoskoModel'); // Load the model
        $this->load->model('BuktiPengirimanModel'); // Load the model
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
        if ($data->role_id !== "1") {
            redirect('404_view'); // Arahkan ke halaman login jika belum login
        }
        
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

        $detailKebutuhanPosko = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
        $buktiPengiriman = $this->BuktiPengirimanModel->getBuktiByKebutuhan($id_kebutuhan);
        $getPosko = $this->PoskoModel->getPosko();
        $getDetailPosko = $this->PoskoModel->getDetailPosko($detailKebutuhanPosko->id_posko);


    

       
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/kebutuhan/detail',[
            'kebutuhanPosko' => $detailKebutuhanPosko,
            'posko' => $getPosko->result(),
            'bukti' => $buktiPengiriman,
            'nama_posko' =>  $getDetailPosko
        ]);
        $this->load->view('dashboard/layout/footer');
        
        // if(!isset($_POST['update'])){
        //     $detailKebutuhanPosko = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
        //     $buktiPengiriman = $this->BuktiPengirimanModel->getBuktiByKebutuhan($id_kebutuhan);
        //     $getPosko = $this->PoskoModel->getPosko();
        //     $getDetailPosko = $this->PoskoModel->getDetailPosko($detailKebutuhanPosko->id_posko);
        //     $this->load->view('dashboard/layout/navbar');
        //     $this->load->view('dashboard/kebutuhan/detail',[
        //         'kebutuhanPosko' => $detailKebutuhanPosko,
        //         'posko' => $getPosko->result(),
        //         'bukti' => $buktiPengiriman,
        //         'nama_posko' =>  $getDetailPosko
        //     ]);
        //     $this->load->view('dashboard/layout/footer');
        // }else{
        //     $data = $this->input->post();

        //     $kebutuhan = [
        //         'id_posko' => $data['posko'],
        //         'jenis_kebutuhan' => $data['kebutuhan'],
        //         'jumlah' => $data['jumlah'],
        //         'status' =>  $data['status']
        //     ];

        //     $this->KebutuhanPoskoModel->updateDataKebutuhan($kebutuhan,$id_kebutuhan);
        // }
            
    }


    public function tambah(){
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('posko', 'Posko', 'required');
        $this->form_validation->set_rules('kebutuhan', 'Jenis Kebutuhan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            // Validasi gagal, tampilkan pesan kesalahan
            $errors = validation_errors();
            $this->session->set_flashdata('error_message', 'Kebutuhan posko gagal disimpan '. $errors);
            redirect('admin/dashboard/kebutuhan-posko');
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

            $this->session->set_flashdata('success_message', 'Kebutuhan posko berhasil disimpan ');
            redirect('admin/dashboard/kebutuhan-posko');
    }


    }

    public function update($id_kebutuhan){
        if(!isset($_POST['update'])){
            
            $detailKebutuhanPosko = $this->KebutuhanPoskoModel->getDetailKebutuhan($id_kebutuhan);
            $getPosko = $this->PoskoModel->getPosko();
            $getDetailPosko = $this->PoskoModel->getDetailPosko($detailKebutuhanPosko->id_posko);
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/kebutuhan/update-kebutuhan',[
                'kebutuhanPosko' => $detailKebutuhanPosko,
                'posko' => $getPosko->result(),
                'nama_posko' =>  $getDetailPosko
            ]);
            $this->load->view('dashboard/layout/footer');
        }else{
            $this->form_validation->set_rules('posko', 'Posko', 'required');
            $this->form_validation->set_rules('kebutuhan', 'Jenis Kebutuhan', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                // Validasi gagal, tampilkan pesan-pesan kesalahan
                $errors = validation_errors();
                $this->session->set_flashdata('error_message', 'Kebutuhan posko gagal diupdate '. $errors);
                redirect('admin/dashboard/kebutuhan-posko/update/'.$id_kebutuhan);
            } else {
                $data = $this->input->post();

                $kebutuhan = [
                    'id_posko' => $data['posko'],
                    'jenis_kebutuhan' => $data['kebutuhan'],
                    'jumlah' => $data['jumlah'],
                    'status' =>  $data['status']
                ];

                $this->KebutuhanPoskoModel->updateDataKebutuhan($kebutuhan,$id_kebutuhan);
                $this->session->set_flashdata('success_message', 'Kebutuhan posko berhasil diupdate ');
                redirect('admin/dashboard/kebutuhan-posko/update/'.$id_kebutuhan);
            }
        }
    }

    public function delete($id_kebutuhan = NULL){
        $this->KebutuhanPoskoModel->deleteDataKebutuhan($id_kebutuhan);
        $this->session->set_flashdata('success_message', 'Kebutuhan posko berhasil dihapus ');
        redirect('admin/dashboard/kebutuhan-posko');
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