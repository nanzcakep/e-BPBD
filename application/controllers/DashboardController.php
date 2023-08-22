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
       
        $user = $this->AuthModel->getUser($this->session->userdata('user_id'));
        $this->load->view('dashboard/layout/navbar');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/layout/footer');
    }

    
}