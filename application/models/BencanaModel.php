<?php

class BencanaModel extends CI_Model {

    private $table = 'bencana';

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function getBencana(){
        return $this->db->get($this->table);
    }

    public function getDetailBencana($id_bencana = NULL){
        $result = $this->db->get_where('bencana', array('id_bencana' => $id_bencana))->row();
        
        if (!$result) {
            throw new Exception('Data not found.');
        }
        
        return $result;
    }

    public function bencana_patch($data){
        $this->form_validation->set_rules('bencana', 'Bencana', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === false) {
            return validation_errors();
        } else {
            return true;
        }

    }

    public function createDataBencana($data){
        $validation_result = $this->bencana_patch($data);

        if ($validation_result === true) {
            $this->db->insert($this->table, $data);
            return true; // Atau berikan respons sukses
        } else {
            return $validation_result; // Atau tampilkan pesan error validasi
        }
    }


    public function updateDataBencana($data,$id_bencana = NULL){
        $validation_result = $this->bencana_patch($data);

        if ($validation_result === true) {
            $this->db->update($this->table, $data, array('id_bencana' => $id_bencana));
            return true; // Atau berikan respons sukses
        } else {
            return $validation_result; // Atau tampilkan pesan error validasi
        }
    }

    public function deleteDataBencana($id_bencana){
        $this->db->delete($this->table, array('id_bencana' => $id_bencana));
    }


}