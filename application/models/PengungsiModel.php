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



}