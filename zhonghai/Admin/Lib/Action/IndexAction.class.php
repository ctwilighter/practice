<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends PublicAction {
	public function __construct(){
		parent::__construct();
	}

    public function index(){
    	$id = $_SESSION['adminid'];
    	$where['id'] = $id;
    	$user = M('admin') ->where($where) ->find();
    	$this->assign('user',$user);
    	//dump($user);
		$this->display();
    }

    public function board()
    {
    	$user = M('admin') ->select();
    	$this->assign('user',$user);
    	$this->display();
    }
}