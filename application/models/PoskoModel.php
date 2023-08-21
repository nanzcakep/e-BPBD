<?php

class PoskoModel extends CI_Model {

    private $table = 'posko';


    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function getPosko(){
        $query = $this->db->get($this->table);
        return $query;
    }

    public function getDetailPosko($id_posko){
        $result = $this->db->get_where($this->table, array('id_posko' => $id_posko))->row();
        
        if (!$result) {
            throw new Exception('Data not found.');
        }
        
        return $result;
    }

    public function getPoskoWithKebutuhan() {
        $this->db->select('posko.id_posko, posko.posko, kebutuhan_posko.jenis_kebutuhan');
        $this->db->from('posko');
        $this->db->join('kebutuhan_posko', 'posko.id_posko = kebutuhan_posko.id_posko');
        $this->db->order_by('posko.id_posko');
        $query = $this->db->get();
    
        $result = [];
        foreach ($query->result() as $row) {
            $result[$row->posko][] = $row->jenis_kebutuhan;
        }
    
        return $result;
    }

    public function getPoskoWithDetails($id_posko) {
        $this->db->select('posko.*, bencana.*, pengungsi.*, kebutuhan_posko.*');
        $this->db->from('posko');
        $this->db->join('bencana', 'posko.id_bencana = bencana.id_bencana', 'left');
        $this->db->join('pengungsi', 'posko.id_posko = pengungsi.id_posko', 'left');
        $this->db->join('kebutuhan_posko', 'posko.id_posko = kebutuhan_posko.id_posko', 'left');
        $this->db->where('posko.id_posko', $id_posko);

        $query = $this->db->get();
        $result = $query->result();

        if (!$result) {
            throw new Exception('Data not found.');
        }

        return $result;
    
       
    }

    public function getPoskoWithBencana($id_posko = NULL) {
        $query = $this->db->select('*')
            ->from($this->table)
            ->join('bencana', 'posko.id_bencana = bencana.id_bencana', 'left')
            ->where('posko.id_posko', $id_posko)
            ->get();

        if ($query->num_rows() === 0) {
            throw new Exception('Data not found.');
        }
        return $query->row(); // Menggunakan row() untuk mendapatkan satu baris data
    }

    public function posko_patch($data){
        // Aturan validasi
        $this->form_validation->set_rules('posko', 'Posko', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
        $this->form_validation->set_rules('id_bencana', 'Bencana', 'required');

        if ($this->form_validation->run() === false) {
            // Validasi gagal, kembali ke halaman form
            return validation_errors();
        } else {
            return true;
        }
    }

    public function createDataPosko($data){
        $validation_result = $this->posko_patch($data);

        if ($validation_result === true) {
            $this->db->insert($this->table, $data);
            return true; // Atau berikan respons sukses
        } else {
            return $validation_result; // Atau tampilkan pesan error validasi
        }
    }

    public function updateDataPosko($data,$id_posko = NULL){
        $validation_result = $this->posko_patch($data);

        if ($validation_result === true) {
            $this->db->update($this->table, $data, array('id_posko' => $id_posko));
            return true; // Atau berikan respons sukses
        } else {
            return $validation_result; // Atau tampilkan pesan error validasi
        }
    }

    public function deleteDataPosko($id_posko = NULL){
       $this->db->delete($this->table, array('id_posko' => $id_posko));
       
    }

}