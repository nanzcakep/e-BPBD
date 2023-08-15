<?php


class DashboardController extends CI_Controller {

    public function index(){
        $this->load->view('dashboard/layout/navbar');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/layout/footer');
    }

    
}