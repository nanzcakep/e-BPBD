<?php

class BuktiController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BencanaModel'); // Load the model
    }

    
}