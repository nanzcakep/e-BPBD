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
}