<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel'); // Load model yang akan digunakan
        $this->load->library('form_validation'); // Load library form_validation
        $this->load->library('session'); // Load library session
    }

    public function index(){
        $this->load->view('pages/login');
    }

    public function login(){

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/admin-login'); // Jika validasi gagal, tampilkan kembali halaman login
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Memeriksa kredensial di model
            $user = $this->AuthModel->login($username, $password);
            
            if ($user) {
                // Jika kredensial valid, set sesi dan arahkan ke halaman lain
                $this->session->set_userdata('user_id', $user->user_id);
                $data = $this->AuthModel->getUser($this->session->userdata('user_id'));
                if ($data->role_id === "1") {
                    redirect('admin/dashboard'); // Arahkan ke halaman login jika belum login
                }else{
                    redirect('dashboard'); // Ganti dengan URL halaman setelah login
                }
                var_dump(0);
            } else {
                // Jika kredensial tidak valid, tampilkan pesan error
                $data['error_message'] = 'Invalid credentials. Please try again.';
                $this->load->view('pages/admin-login', $data);
            }
        }
    }
    public function logout() {
        // Hapus sesi dan arahkan kembali ke halaman login
        $this->session->unset_userdata('user_id');
        redirect('AuthController/index'); // Ganti dengan URL halaman login atau beranda
    }
}
