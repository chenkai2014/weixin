<?php
include('/global.php');
define('TOKEN', 'weixin');

class Weixin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    // 在微信平台上设置的对外 URL
    public function message()
    {
        if ($this->_valid())
        {
            // 判读是不是只是验证
            $echostr = $this->input->get('echostr');
            if (!empty($echostr))
            {
                $this->load->view('valid_view', array('output' => $echostr));
            }
            else
            {
                // 实际处理用户消息
                $this->_responseMsg();
            }
        }
        else
        {
            $this->load->view('valid_view', array('output' => 'Error!'));
        }
    }

    // 用于接入验证
    private function _valid()
    {
        $token = TOKEN;

        $signature = $this->input->get('signature');
        $timestamp = $this->input->get('timestamp');
        $nonce = $this->input->get('nonce');

        $tmp_arr = array($token, $timestamp, $nonce);
        sort($tmp_arr);
        $tmp_str = implode($tmp_arr);
        $tmp_str = sha1($tmp_str);

        return ($tmp_str == $signature);
    }

    // 这里是处理消息的地方，在这里拿到用户发送的字符串
    private function _responseMsg()
    {
        $this->load->model('weixin_account_model');
        $this->load->model('member_model');
        $this->load->model('fans_model');
        $this->load->model('message_model');

        $post_str = file_get_contents('php://input');

        if (!empty($post_str))
        {
            // 解析微信传过来的 XML 内容
            $post_obj = simplexml_load_string($post_str, 'SimpleXMLElement', LIBXML_NOCDATA);
            $from_username = $post_obj->FromUserName;
            $to_username = $post_obj->ToUserName;
            // $keyword 就是用户输入的内容
            $keyword = trim($post_obj->Content);

            $account_info=$this->weixin_account_model->getWeixinAccountInfo(array('acid'=>1));
            //获取access_token
            $access_token=$account_info['access_token'];
            //如果access_token失效。
            if($account_info['expires_out']<=time()){
                $token_access_url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.appsecret;
                $res=file_get_contents($token_access_url);
                $result = json_decode($res, true);

                $data=array();
                $data['access_token']=$result['access_token'];
                $data['expires_out']=intval(time())+intval($result['expires_in']);

                $this->weixin_account_model->editWeixinAccount($data,array('acid'=>1));

                $access_token=$result['access_token'];
            }

            $msg='我收到了您的消息';
            //是否有该会员，如没有则将其记录会员表
            $fans_info=$this->fans_model->getFansInfo(array('open_id'=>$from_username));
            if(!$fans_info){
                //获取用户的基本信息
                $fans_info_url='https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$from_username.'&lang=zh_CN';
                $res=file_get_contents($fans_info_url);
                $fans_info_result=json_decode($res,true);

                $data=array();
                $data['open_id']=$from_username;
                $data['nickname']=$fans_info_result['nickname'];
                $data['city']=$fans_info_result['city'];

                $this->fans_model->addFans($data);

            }
            else
            {
                $msg='会员已经存在';
            }

            if (!empty($keyword))
            {
                //将用户的信息存入数据库
                $fans_info=$this->fans_model->getFansInfo(array('open_id'=>$from_username));
                $data=array();
                $data['fans_id']=$fans_info['fans_id'];
                $data['content']=$keyword;
                $data['create_time']=time()+3600*6;
                $this->message_model->addMessage($data);

                // 文本类型的消息
                $type = "text";
                $data = array(
                    'to' => $from_username,
                    'from' => $to_username,
                    'type' => $type,
                    'content' =>$keyword,
                );
                $this->load->view('response_view', $data);
            }
            else
            {
                $type = "text";
                $content = "请说点什么吧～呵呵～";

                $data = array(
                    'to' => $from_username,
                    'from' => $to_username,
                    'type' => $type,
                    'content' => $content,
                );
                $this->load->view('response_view', $data);
            }
        }
        else
        {
            $this->load->view('valid_view', array('output' => 'Error!'));
        }
    }

    // 解析用户输入的字符串
    private function _parseMessage($message)
    {
        return '我已经收到了您的信息！';
    }
}

/* End of file weixin.php */
/* Location: ./application/controllers/weixin.php */
