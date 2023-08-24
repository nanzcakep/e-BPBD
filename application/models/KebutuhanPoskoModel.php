<?php 


class KebutuhanPoskoModel extends CI_Model {
    private $table = 'kebutuhan_posko';

    public function getKebutuhanPosko(){
        return $this->db->get($this->table)->result();
    }

    public function getKebutuhanByPoskoId($id_posko) {
        $query = $this->db->select('*')
                 ->from('kebutuhan_posko')
                 ->where('id_posko', $id_posko)
                 ->get();
       
        return $query->result();
    }

    public function getDetailKebutuhan($id_kebutuhan = NULL){
        $result = $this->db->get_where($this->table, array('id_kebutuhan' => $id_kebutuhan))->row();
        
        if (!$result) {
            redirect('404_view');
        }
        
        return $result;
    }

    
   public function createDataKebutuhan($data){
        $this->db->insert($this->table, $data);
   }

   public function updateDataKebutuhan($data,$id_kebutuhan = NULL){
        $query = $this->db->update($this->table, $data, array('id_kebutuhan' => $id_kebutuhan));
        if (!$query) {
            // Update successful
            echo "Update failed.";
        } 
   }

   public function deleteDataKebutuhan($id_kebutuhan = NULL){
       $query =  $this->db->delete($this->table, array('id_kebutuhan' => $id_kebutuhan));
       if ($query) {
            // Update successful
            echo "Delete successful.";
        } else {
            // Update failed
            echo "Delete failed.";
        }
   }

   public function getPengirimanWithUsername()
    {
        $this->db->select('pengiriman_kebutuhan_posko.*, users.username');
        $this->db->from('pengiriman_kebutuhan_posko');
        $this->db->join('users', 'users.user_id = pengiriman_kebutuhan_posko.user_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }



    
}