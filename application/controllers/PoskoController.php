<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoskoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PoskoModel'); // Load the model
        $this->load->model('BencanaModel');
        $this->load->model('PengungsiModel');
        $this->load->model('KebutuhanPoskoModel');
    }

    public function index(){
       $posko = $this->PoskoModel->getPosko();
       $bencana = $this->BencanaModel->getBencana();

       
       $this->load->view('dashboard/layout/navbar');
       $this->load->view('dashboard/posko/index',[
            "data" => $posko,
            "title" => 'Posko',
            "bencana" => $bencana
        ]); 
        $this->load->view('dashboard/layout/footer');
    }

    // public function detail($id_posko = NULL) {
    //     try {
    //         $poskoDetails = $this->PoskoModel->getPoskoWithDetails($id_posko);
    //         // var_dump($poskoDetails);
    //         $this->load->view('pages/posko/detail', [
    //             'data' => $poskoDetails,
    //             'title' => 'Detail Posko'
    //         ]);
    //     } catch (Exception $e) {
    //         redirect('404_views');
    //     }
    // }

    
    public function detail($id_posko = NULL){
        try {
            $posko = $this->PoskoModel->getPoskoWithBencana($id_posko);
            $pengungsi = $this->PengungsiModel->getPengungsiByPosko($id_posko);
            $kebutuhan = $this->KebutuhanPoskoModel->getKebutuhanByPoskoId($id_posko);
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/posko/detail', [
                'data' => $posko,
                'pengungsi' => $pengungsi,
                'kebutuhan' => $kebutuhan,
                'title' => 'Detail Posko'
            ]);
            $this->load->view('dashboard/layout/footer');
        } catch (Exception $e) {
            redirect('404_views');
        }
    }

    public function tambah(){
        $data = $this->input->post();
        if($data){
            $save =  $this->PoskoModel->createDataPosko($data);
            if ($save === true) {
                    // Data berhasil disimpan, berikan respons sukses
                    echo "Data Posko berhasil disimpan.";
                } else {
                    // Data gagal disimpan, tampilkan pesan error validasi
                    echo "Terjadi kesalahan: " . $save;
                }
            }else{
                redirect('404_views');
            }
    }

    public function update($id_posko = NULL){
        if (!isset($_POST['update'])) {
            try {
                $bencana = $this->BencanaModel->getBencana();
                $posko = $this->PoskoModel->getPoskoWithBencana($id_posko);
                $this->load->view('dashboard/layout/navbar');
                $this->load->view('dashboard/posko/update', [
                    'data' => $posko,
                    'bencana' => $bencana,
                    'title' => 'Detail Posko'
                ]);
                $this->load->view('dashboard/layout/footer');
            } catch (Exception $e) {
                redirect('404_views');
            }
        } else {
            $data = $this->input->post();
            if ($data) {
                $posko = [
                    'posko' => $data['posko'],
                    'alamat' => $data['alamat'],
                    'kota' => $data['kota'],
                    'kapasitas' => $data['kapasitas'],
                    'id_bencana' => $data['id_bencana'],
                ];
    
                $save = $this->PoskoModel->updateDataPosko($posko, $id_posko);
    
                if ($save === true) {
                    // Data berhasil disimpan, berikan respons sukses
                    echo "Data posko berhasil disimpan.";
                } else {
                    // Data gagal disimpan, tampilkan pesan error validasi
                    echo "Terjadi kesalahan: " . $save;
                }
            } else {
                redirect('404_views');
            }
        }
    }

    public function delete($id_posko = NULL){
        try {
            $this->PoskoModel->deleteDataPosko($id_posko);
            // Jika berhasil dihapus, berikan notifikasi sukses
            echo "Data posko berhasil dihapus.";
        } catch (Exception $e) {
            // Jika terjadi kesalahan, arahkan ke halaman 404
            redirect('404_views');
        }
    }


}
