<?php

class KorbanController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('KorbanJiwaModel'); // Load model yang akan digunakan
        
    }

    public function index(){

        $korbanjiwa = $this->KorbanJiwaModel->getKorbanJiwa();
        

        $this->load->view('dashboard/layout/navbar');
        $this->load->view('dashboard/korban/index',[
            'korbanjiwa' => $korbanjiwa
        ]);
        $this->load->view('dashboard/layout/footer');
    }

    public function detail($id){
        $query = $this->KorbanJiwaModel->getDetailKorban($id);

        if($query === NULL ) {
           redirect('404_views');
        }else{
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/korban/detail',[
                'data' => $query
            ]);
            $this->load->view('dashboard/layout/footer');
        }
    }

    public function tambah(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('umur', 'Umur', 'integer', array('integer' => 'Umur harus integer'));
        


        $data = $this->input->post();


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error_message',validation_errors());
            redirect('admin/dashboard/korban-jiwa');
        }else {
           $korbanjiwa = [
            'nama' => $data['nama'],
            'umur' => $data['umur'],
            'jenis_kelamin' => $data['gender'],
            'alamat' => $data['alamat'],
            'keterangan' => $data['keterangan'] 
           ];

           $this->KorbanJiwaModel->tambahKorban($korbanjiwa);
           $this->session->set_flashdata('success_message','Data korban berhasil ditambahkan ');
           redirect('admin/dashboard/korban-jiwa');
        }
    }


    public function update($id){
        $data = $this->input->post();
        $query = $this->KorbanJiwaModel->getDetailKorban($id);

        if($query === NULL ) {
            redirect('404_views');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('umur', 'Umur', 'integer', array('integer' => 'Umur harus integer'));
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Jenis kelamin harus diisi'));
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => 'alamat harus diisi'));
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => 'Keterangan harus diisi'));
       

        if(!isset($_POST['update'])){
            $this->load->view('dashboard/layout/navbar');
            $this->load->view('dashboard/korban/update',[
                'korban' => $query
            ]);
            $this->load->view('dashboard/layout/footer');
        }else{
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error_message',validation_errors());
                redirect('admin/dashboard/korban-jiwa/update/'.$id);
            }else {
               $korbanjiwa = [
                'nama' => $data['nama'],
                'umur' => $data['umur'],
                'jenis_kelamin' => $data['gender'],
                'alamat' => $data['alamat'],
                'keterangan' => $data['keterangan'] 
               ];
    
               $this->KorbanJiwaModel->updateKorban($id,$korbanjiwa);
               $this->session->set_flashdata('success_message','Data korban berhasil diubah ');
               redirect('admin/dashboard/korban-jiwa/update/'.$id);
            }
        }
    }

    public function delete($id){
        $query = $this->KorbanJiwaModel->getDetailKorban($id);

        if($query === NULL ) {
           redirect('404_views');
        }else{
            $this->KorbanJiwaModel->deleteKorban($id);
            $this->session->set_flashdata('success_message','Data korban berhasil dihapus');
            redirect('admin/dashboard/korban-jiwa');
        }
    }

}