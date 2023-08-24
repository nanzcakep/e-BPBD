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
            
                $this->session->set_flashdata('error_message', 'Invalid credentials. Please try again.');
                redirect('login');
               
            }
        }
    }

    public function registrationView(){
        $this->load->view('pages/register');
    }

    public function register()
	{
        // Load form validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == false) {
            // Validation failed, load the registration view with errors
            $errors = validation_errors();
            $this->session->set_flashdata('error_message', 'Kebutuhan posko gagal diupdate '. $errors);
            redirect('register');
        } else {
            // Validation passed, process the registration
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Example: Create an array with user data
            $user_data = array(
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
                'role_id' => 2
                // Add more user data fields as needed
            );

            // Example: Insert user data into the database using a model
           
            $this->AuthModel->registerUser($user_data);

            // You can add flash messages here
            $this->session->set_flashdata('success_message', 'Registration successful silahkan login');

            // Redirect to a success page or any other page you want
            redirect('register');
        }
	}
    public function logout() {
        // Hapus sesi dan arahkan kembali ke halaman login
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('error_message', 'Logout berhasil');
        redirect('login'); // Ganti dengan URL halaman login atau beranda
    }
}
