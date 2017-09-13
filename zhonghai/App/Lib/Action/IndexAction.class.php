<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends PublicAction {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){

    	// $where['id'] = array('between','1,8');
    	// $server = M('server')->where($where)->select();
        $server = M('server')->order('id desc')->limit(4)->select(); 
    	$this->assign('server',$server);
    	//dump($server);

    	// $where['id'] = array('lt','3');
    	// $news = M('news')->where($where)->select();
        $news = M('news')->order('id desc')->limit(2)->select();
        $this->assign('news',$news);
    	//dump($news);

		$this->display();
    }
    public function desc(){
    	$this->display();
    }
    public function contact(){
    	$this->display();
    }
    public function test(){
    	//$model = new Model('news');

    	/*$data = M('intro')->select();
    	dump($data);
    	$name = 'cheng';
    	$this->assign('name',$name);
    	$this->assign('data',$data);*/

    	// $data = [];
    	// for ($i=0; $i <4; $i++) { 
    	// 	$data[] = [
    	// 		'cid' => 3,
    	// 		'title' => "酒店案例{$i}",
    	// 		'image' => '__ROOT__/Public/Index/images/10.png',
    	// 		'desc' => "这里是酒店案例{$i}的简介"
    	// 	];
    	// }
    	// dump($data);
    	// $res = M('cases')->addAll($data);
    	// dump($res);
        
        // $data =[
        //     'username' => 'twilighter',
        //     'password' => md5('twilighter'), 
        //     'email' => '1529726299@qq.com', 
        //     'img' => '__ROOT__/public/Admin/img/user.png', 
        //     'loginip' => get_ip(), 
        //     'logintime' => time(),
        // ];
        // $res = M('admin') -> add($data);
        // dump($data);
        // dump($res);

    	$this->display();
    }
}