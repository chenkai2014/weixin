<?php
class Message_model extends CI_Model{


    public function __construct()
    {
        $this->load->database();
    }

    public function addMessage($data)
    {
        return $this->db->insert('message',$data);
    }

    public function getMessageInfo($condition){
        $query = $this->db->get_where('message',$condition);
        return $query->row_array();
    }

    public function getMessageList($condition=array())
    {
        $query=$this->db->get_where('message',$condition);
        return $query->result_array();
    }

    public function deleteMessage($condition=array()){
        return $this->db->delete('message', $condition);
    }

    public function editMessage($data,$condition){
        $this->db->where($condition);
        return $this->db->update('message', $data);
    }


}
?>
