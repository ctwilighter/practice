<?php 

	/**
	* 
	*/
	class LoginAction extends CommonAction
	{
		public function __construct(){
			parent::__construct();
		}
		
		//登录
	    public function login() {
	    	$data = I('post.');
	        if ($data) {
				$username = $data['username'];
	            $password = $data['password'];
	            if (empty($username) || empty($password)) {
	                //message('用户名或密码不能为空！',-1);
	                $this->error("用户名或密码不能为空！");
	            }
	            $pwd = md5($password);
	            $user = M('admin')->where("username='$username' AND password='$pwd'")->find();
	            if ($user) {
	                $_SESSION['adminid'] = $user['id'];
	                $_SESSION['adminname'] = $user['username'];
	                $user['loginip']=  get_client_ip();
	                $user['logintime']=  time();
	                $res=M('admin')->save($user);
	                $this->success("欢迎小主回来！",__APP__,3);
	            } else {
	                //message('用户名或密码错误！',-1);
					$this->error("用户名或密码错误！");
	            }
	        } else {
	            $this->display();
	        }
	    }

	    //退出登录
	    public function logout() {
	        unset($_SESSION['adminid']);
	        unset($_SESSION['adminname']);
	        $this->success("退出成功！", __APP__.'/Login/login',2);
	    }

	}