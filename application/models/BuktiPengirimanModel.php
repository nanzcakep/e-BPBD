<?php

class BuktiPengirimanModel extends CI_Model {
    private $table = 'pengiriman_kebutuhan_posko';

    public function getBuktiByKebutuhan($id_kebutuhan){
        $this->db->select('pengiriman_kebutuhan_posko.*, users.username');
        $this->db->from($this->table);
        $this->db->where('id_kebutuhan', $id_kebutuhan);
        $this->db->join('users', 'users.user_id = pengiriman_kebutuhan_posko.user_id', 'left');
        $query = $this->db->get();
    
        return $query->result();
    }

    public function createDonasi($data){
        $this->db->insert($this->table, $data);
   }

    public function getHistoryUser($user_id){
        $query = $this->db->select('pengiriman.*, kebutuhan.jenis_kebutuhan')
        ->from('pengiriman_kebutuhan_posko as pengiriman')
        ->join('kebutuhan_posko as kebutuhan', 'pengiriman.id_kebutuhan = kebutuhan.id_kebutuhan', 'left')
        ->where('pengiriman.user_id', $user_id)
        ->get();

        if ($query->num_rows() === 0) {
            return []; // Return empty array if no data found
        }
        return $query->result(); // Menggunakan result() untuk mendapatkan beberapa baris data

    
    }

    public function updateStatusById($id, $status) {
        $data = array(
            'status' => $status
        );
    
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function updateDonasi($id_pengiriman, $data){
        $this->db->update($this->table, $data, array('id_pengiriman' => $id_pengiriman));
    }

    public function detailDonasi($id_pengiriman){
        $query = $this->db->get_where($this->table, array('id_pengiriman' => $id_pengiriman));
        
        // Mengembalikan hasil query dalam bentuk row atau NULL jika tidak ditemukan
        return $query->row();
    }


}