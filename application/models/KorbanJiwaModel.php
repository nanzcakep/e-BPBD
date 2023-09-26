<?php 

class KorbanJiwaModel extends CI_Model {


    private $table = 'korban_jiwa';
    

    public function getKorbanJiwa(){
        return $this->db->get($this->table)->result();
    }

    public function getDetailKorban($id) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id = $id");

        return $query->row();
    }

    public function tambahKorban($data){
        $this->db->insert($this->table, $data);
    }

    public function updateKorban($id,$data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function deleteKorban($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function jumlahKorban(){
        return $this->db->count_all($this->table);
    }


}