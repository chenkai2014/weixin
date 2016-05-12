<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Fans_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addFans($data)
    {
        return $this->db->insert('fans',$data);
    }

    public function getFansInfo($condition){
        $query = $this->db->get_where('fans',$condition);
        return $query->row_array();
    }

    public function getFansList($condition=array())
    {
        $query=$this->db->get_where('fans',$condition);
        return $query->result_array();
    }

    public function deleteFans($condition=array()){
        return $this->db->delete('fans', $condition);
    }

    public function editFans($data,$condition){
        $this->db->where($condition);
        return $this->db->update('fans', $data);
    }


}
?>
