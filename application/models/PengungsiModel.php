<?php 

class PengungsiModel extends CI_Model {

    private $table = 'pengungsi';

    public function getPengungsiByPosko($id_posko) {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('id_posko', $id_posko)
            ->get();

        return $query->result();
    }

    public function getPengungsiAndPosko(){
        $query = $this->db->select('*')
                        ->from($this->table)
                        ->join('posko', 'posko.id_posko = ' . $this->table . '.id_posko')
                        ->get();

        return $query->result();
    }

    public function getDetailPengungsi($id_pengungsi = NULL){
        $result = $this->db->get_where($this->table, array('id_pengungsi' => $id_pengungsi))->row();
        
        if (!$result) {
            throw new Exception('Data not found.');
        }
        
        return $result;
    }

    public function createPengungsi($data){
        $this->db->insert($this->table, $data);
    }

    public function updatePengungsi($data,$id_pengungsi){
        $this->db->update($this->table, $data, array('id_pengungsi' => $id_pengungsi));
    }

    public function deletePengungsi($id_pengungsi){
        $this->db->delete($this->table, array('id_pengungsi' => $id_pengungsi));
    }


    public function countBalita(){
        $this->db->where('umur >=', 1);
        $this->db->where('umur <=', 5);
        $this->db->from($this->table);
        $count = $this->db->count_all_results();

        return $count;
    }

    public function countDewasa(){
        $this->db->where('umur >=', 6);
        $this->db->where('umur <=', 30);
        $this->db->from($this->table);
        $count = $this->db->count_all_results();

        return $count;
    }

    public function countOrangTua(){
        $this->db->where('umur >=', 31);
        $this->db->where('umur <=', 90);
        $this->db->from($this->table);
        $count = $this->db->count_all_results();

        return $count;
    }

    public function jumlahPengungsi(){
        return $this->db->count_all($this->table);
    }



}