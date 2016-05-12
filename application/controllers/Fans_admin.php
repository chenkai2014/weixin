<?php
class Fans_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    //查看粉丝的消息记录
    public function showLog(){
        $this->load->model('message_model');

        $condition=array();
        $condition['fans_id']=$_GET['fans_id'];
        if(!empty($_GET['date_start'])){
            $condition['create_time >=']=strtotime($_GET['date_start']);

        }
        if(!empty($_GET['date_end'])){
            $condition['create_time <=']=strtotime($_GET['date_end']);

        }
        $message_list=$this->message_model->getMessageList($condition);

        $data=array();
        $data['message_list']=$message_list;
        $data['fans_id']=$_GET['fans_id'];

        $this->load->view('templates/header_admin');
        $this->load->view('message_index_admin',$data);

    }

    //获取粉丝列表
    public function index(){
        $this->load->model('fans_model');

        $condition=array();
        if(!empty($_GET['nickname'])){
            $condition['nickname']=$_GET['nickname'];
        }

        $fans_list=$this->fans_model->getFansList($condition);

        $data=array();
        $data['fans_list']=$fans_list;


        $this->load->view('templates/header_admin',$data);
        $this->load->view('fans_index_admin',$data);
    }

}