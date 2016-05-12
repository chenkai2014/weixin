<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/5
 * Time: 20:45
 */
?>
<?php
class Weixin_account_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function addWeixinAccount($data)
    {
        return $this->db->insert('weixin_account',$data);
    }

    public function getWeixinAccountInfo($condition){
        $query = $this->db->get_where('weixin_account',$condition);
        return $query->row_array();
    }

    public function getWeixinAccountList($condition=array())
    {
        $query=$this->db->get_where('weixin_account',$condition);
        return $query->result_array();
    }

    public function deleteWeixinAccount($condition=array()){
        return $this->db->delete('weixin_account', $condition);
    }

    public function editWeixinAccount($data,$condition){
        $this->db->where($condition);
        return $this->db->update('weixin_account', $data);
    }


}
?>
