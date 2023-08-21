<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_status_header('404');
        $this->load->view('404_view'); // Ganti dengan nama tampilan 404 Anda
    }
}