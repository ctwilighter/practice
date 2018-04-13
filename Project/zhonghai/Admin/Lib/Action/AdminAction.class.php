<?php 


	/**
	* 
	*/
	class AdminAction extends PublicAction
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			import('ORG.Util.Page');
			$count = M('admin') ->count();
			$page = new Page($count,10);
			$show = $page ->show();
			$list = M('admin') ->limit($page->firstRow.','.$page->listRows) ->select();
			$id = $_SESSION['adminid'];
	    	$where['id'] = $id;
	    	$user = M('admin') ->where($where) ->find();
	    	if ($user['status'] != 1) {
	    		$this->error('sorry,你没有权限处理管理员信息',__APP__);
	    	}
	    	$this->assign('user',$user);
			$this ->assign('admin',$list);
			$this ->assign('page',$show);
			$this->display();
		}

		public function add()
		{
			//$data = I('post.');
			//dump($data);
			
			$this->display();
		}

		public function edit()
		{
			$id = $_GET['id'];
			$where['id'] = $id;
			$admin = M('admin') ->where($where) ->find();
			$data = I('post.');
			if ($data) {
				if ($admin['password'] == md5($data['fpassword'])) {
					import('ORG.Net.UploadFile');
					$upload = new UploadFile();
					$upload -> maxSize = 314528;
					$upload -> allowExts = array('jpg','png','gif','jpeg');
					$upload -> savePath = 'Public/Uploads/image/';
					$data = $_POST;
					if ($data['password'] !== $data['upassword']) {
						$this->error('密码输入不一致');
					}else{
						if(!$upload -> upload()){
							$this -> error($upload->getErrorMsg());
						}else{
							$info = $upload ->getUploadFileInfo();
							$data['password'] = md5($data['password']);
							$data['img'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
							$res = M('admin') ->where($where) -> save($data);
							if ($res !== false) {
								$this->success('数据上传成功',__APP__.'/Admin/index');
							}else{
								$this->error('数据上传失败');
							}
							// dump($data);
							// dump($info);
						}
					}
				}else{
					$this->error('原始密码不正确');
				}
				
			}else{
				$this ->assign('admin',$admin);
				//dump($admin);
				$this ->display();
			}
			
		}

		public function del()
		{
			$id = $_GET['id'];
			$where['id'] = $id;
			$res = M('admin') -> where($where) -> delete();
			if ($res !== false) {
				$this->success('数据删除成功,请回列表查看');
			}else{
				$this->error('数据删除失败，请重新操作');
			}
		}

		public function upload()
		{
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload -> maxSize = 314528;
			$upload -> allowExts = array('jpg','png','gif','jpeg');
			$upload -> savePath = 'Public/Uploads/image/';
			$data = $_POST;
			if ($data['password'] !== $data['upassword']) {
				$this->error('密码输入不一致');
			}else{
				if(!$upload -> upload()){
					$this -> error($upload->getErrorMsg());
				}else{
					$info = $upload ->getUploadFileInfo();
					$data['password'] = md5($data['password']);
					$data['img'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
					$res = M('admin') -> add($data);
					if ($res !== false) {
						$this->success('数据上传成功',__APP__.'/Admin/index');
					}else{
						$this->error('数据上传失败');
					}
					// dump($data);
					// dump($info);
				}
			}
		}

		public function editstatus()
		{
			$id = $_POST['id'];
			$data['status'] = $_POST['status'];
			//dump($id);
			$where['id'] = $id;
			$res = M('admin')->where($where)->save($data);
			if ($res !== false) {
				$data['msg'] = "设置成功";
			}else{
				$data['msg'] ="设置失败";
			}
			$this->ajaxReturn($data);
		}

		public function editPic()
		{
			//$pic = request()->file("img");
			$id = $_POST['id'];
			$where['id'] = $id;
			// dump($pic);
			// dump($id);
			//$this->ajaxReturn($id);
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload -> maxSize = 314528;
			$upload -> allowExts = array('jpg','png','gif','jpeg');
			$upload -> savePath = 'Public/Uploads/image/';
			if(!$upload -> upload()){
				$this -> ajaxReturn($upload->getErrorMsg());
			}else{
				$info = $upload ->getUploadFileInfo();
				$data['img'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
				$res = M('admin') -> where($where)-> save($data);
				if ($res !== false) {
					$picinfo = M('admin') ->where($where) ->find();
					$picinfo['img'] = substr($picinfo['img'],9);
					$this->ajaxReturn($picinfo['img']);
					//echo $picinfo['img'];
					//$this->success('数据上传成功',__APP__.'/Admin/index');
				}else{
					$this->ajaxReturn("错误");
					//$this->error('数据上传失败');
				}
				// dump($data);
				// dump($info);
			}
		}

	}