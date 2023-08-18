<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BencanaController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('BencanaModel'); // Load the model
    }

    public function index(){
        $bencana = $this->BencanaModel->getBencana(); // Call the getMobil method from the model
        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/bencana/index',[
            'data' => $bencana,
            'title' => 'Bencana'
        ]); 
        $this->load->view('dashboard/layout/footer');
    }

    public function detail($id_bencana = NULL){
        try {
            $bencana = $this->BencanaModel->getDetailBencana($id_bencana);
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/bencana/detail',[
                'data' => $bencana,
                'title' => 'Detail bencana'
            ]);
            $this->load->view('dashboard/layout/footer');
        } catch (Exception $e) {
            redirect('404_views');
        }
    }

    public function tambah(){

        $data = $this->input->post();
        if($data){
            $tanggal = date('Y-m-d', strtotime($data['tanggal']));
        
            $bencana = array(
                'bencana' => $data['bencana'],
                'tanggal' => $tanggal,
                'lokasi' => $data['lokasi'],
                'keterangan' => $data['keterangan']
            );

            $save =  $this->BencanaModel->createDataBencana($bencana);

            if ($save === true) {
                    // Data berhasil disimpan, berikan respons sukses
                    echo "Data bencana berhasil disimpan.";
                } else {
                    // Data gagal disimpan, tampilkan pesan error validasi
                    echo "Terjadi kesalahan: " . $save;
                }
            }else{
                redirect('404_views');
            }

    }
        
    public function update($id_bencana = NULL) {
        if (!isset($_POST['update'])) {
            try {
                $bencana = $this->BencanaModel->getDetailBencana($id_bencana);
                $this->load->view('pages/bencana/update', [
                    'data' => $bencana,
                    'title' => 'Detail bencana'
                ]);
            } catch (Exception $e) {
                redirect('404_views');
            }
        } else {
            $data = $this->input->post();
            if ($data) {
                $tanggal = date('Y-m-d', strtotime($data['tanggal']));
    
                $bencana = [
                    'bencana' => $data['bencana'],
                    'tanggal' => $tanggal,
                    'lokasi' => $data['lokasi'],
                    'keterangan' => $data['keterangan']
                ];
    
                $save = $this->BencanaModel->updateDataBencana($bencana, $id_bencana);
    
                if ($save === true) {
                    // Data berhasil disimpan, berikan respons sukses
                    echo "Data bencana berhasil disimpan.";
                } else {
                    // Data gagal disimpan, tampilkan pesan error validasi
                    echo "Terjadi kesalahan: " . $save;
                }
            } else {
                redirect('404_views');
            }
        }
    }

    public function delete($id_bencana = NULL){
        try {
            $this->BencanaModel->deleteDataBencana($id_bencana);
            // Jika berhasil dihapus, berikan notifikasi sukses
            echo "Data bencana berhasil dihapus.";
        } catch (Exception $e) {
            // Jika terjadi kesalahan, arahkan ke halaman 404
            redirect('404_views');
        }
    }
    
    
}