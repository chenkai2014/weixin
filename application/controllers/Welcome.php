<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('/global.php');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('templates/header_admin');
		$this->load->view('welcome_message');
	}


	//用户登出
	public function logout()
	{
		$this->session->unset_userdata('member_id');
		$this->session->unset_userdata('member_name');
		$this->session->unset_userdata('is_login');
	    header('Location:http://'.HOSTNAME.'/index.php/Welcome/index');
	}

	//用户登录
	public function login()
	{
        $username=$_POST['username'];
		$password=$_POST['password'];

		//获取用户信息
		$this->load->model('member_model');
		$result=$this->member_model->getMemberInfo($username,$password);
		$data['member_info']=$result;

		if(!empty($data['member_info']))
		{
			$arr['is_login']=1;
			$arr['member_id']=$data['member_info']['member_id'];
			$arr['member_name']=$data['member_info']['name'];

			$this->session->set_userdata($arr);
			$this->session->set_userdata($arr);
			$this->session->set_userdata($arr);

			$member_list=$this->member_model->getMemberList();

			$data=array();
			$data['member_list']=$member_list;

			$this->load->view('templates/header_admin',$data);
			$this->load->view('member_index_admin',$data);
		}
		else
		{
			$this->load->view('errors/error.php',$data);
		}
	}
}
