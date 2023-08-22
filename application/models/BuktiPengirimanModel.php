<?php

class BuktiPengirimanModel extends CI_Model {
    private $table = 'pengiriman_kebutuhan_posko';

    public function getBuktiByKebutuhan($id_kebutuhan){
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('id_kebutuhan', $id_kebutuhan)
            ->get();

        return $query->result();
    }

    public function createDonasi($data){
        $this->db->insert($this->table, $data);
   }

    public function getHistoryUser($user_id){
        $query = $this->db->select('pengiriman_kebutuhan_posko.*, users.username, users.email')
            ->from($this->table)
            ->join('users', 'pengiriman_kebutuhan_posko.user_id = users.user_id', 'left')
            ->where('pengiriman_kebutuhan_posko.user_id', $user_id)
            ->get();

        if ($query->num_rows() === 0) {
            return []; // Return empty array if no data found
        }
        return $query->result(); // Menggunakan result() untuk mendapatkan beberapa baris data
    
    }
}