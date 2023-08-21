<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengungsiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('PengungsiModel');
        $this->load->model('PoskoModel');
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
        if ($data->role_id !== "1") {
            redirect('404_view'); // Arahkan ke halaman login jika belum login
        }
    }

    public function index(){
        $pengungsi = $this->PengungsiModel->getPengungsiAndPosko();
        $posko = $this->PoskoModel->getPosko();
        
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/pengungsi/index',[
            'data' => $pengungsi,
            'title' => 'Data Pengungsi',
            'posko' => $posko
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

    public function tambah(){

        //validation field
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('posko', 'Posko', 'required');

       
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan pesan-pesan kesalahan
            echo "Gagal menambahkan data anda tidak mengisi form";
        } else {
            // Validasi berhasil, lanjutkan dengan aksi yang diinginkan
            $data = $this->input->post();

            $tanggal = date('Y-m-d', strtotime($data['masuk']));

            $pengungsi = [
                'nama' => $data['nama'],
                'umur' => $data['umur'],
                'jenis_kelamin' => $data['gender'],
                'alamat' => $data['alamat'],
                'tanggal_masuk' => $tanggal,
                'id_posko' => $data['posko']
            ];

            $this->PengungsiModel->createPengungsi($pengungsi);

            redirect('admin/dashboard/pengungsi');
        }

    }

    public function update($id_pengungsi){
        if(isset($_POST['update'])){
            //validation field
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
            $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('masuk', 'Tanggal Masuk', 'required');
            $this->form_validation->set_rules('posko', 'Posko', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Validasi gagal, tampilkan pesan-pesan kesalahan
                echo "Gagal menambahkan data anda tidak mengisi form";
            } else {
                // Validasi berhasil, lanjutkan dengan aksi yang diinginkan
                $data = $this->input->post();

                $tanggal = date('Y-m-d', strtotime($data['masuk']));

                $pengungsi = [
                    'nama' => $data['nama'],
                    'umur' => $data['umur'],
                    'jenis_kelamin' => $data['gender'],
                    'alamat' => $data['alamat'],
                    'tanggal_masuk' => $tanggal,
                    'id_posko' => $data['posko']
                ];

                $this->PengungsiModel->updatePengungsi($pengungsi,$id_pengungsi);

                redirect('admin/dashboard/pengungsi');
            }
        }else{
            $pengungsi = $this->PengungsiModel->getDetailPengungsi($id_pengungsi);
            $posko = $this->PoskoModel->getPosko();
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/pengungsi/update',[
                    'pengungsi' => $pengungsi,
                    'data' => $posko,
                    'title' => 'Update Pengungsi'
                ]);
            $this->load->view('dashboard/layout/footer');
        }
         
    }

    public function delete($id_pengungsi){
        $this->PengungsiModel->deletePengungsi($id_pengungsi);
        redirect('admin/dashboard/pengungsi');
    }

}