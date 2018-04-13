<?php 

	/**
	* 
	*/
	class IntroAction extends PublicAction
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$intro = M('intro')->find();
			$this ->assign('intro',$intro);
			$this->display();
		}

		public function edit()
		{
			// $id = I('get.id');
			// $where['id'] =  $id;
			// $intro = M('intro') ->where($where) ->find();
			$intro = M('intro')->find();
			$data = I('post.');
			if ($data) {
				import('ORG.Net.UploadFile');
				$upload = new UploadFile();
				$upload -> maxSize = 10240;
				$upload -> allowExts = array('png','jpg','jpeg','gif');
				$upload -> savePath = 'Public/Uploads/image/';
				if (!$upload -> upload()) {
					echo $upload ->getErrorMsg();
				}else{
					$info = $upload ->getUploadFileInfo();
					//dump($info);
					$data['icon'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
					$data['wechat'] = '__ROOT__/'.$info[1]['savepath'].$info[1]['savename'];
				}
				//dump($data);
				$where['id'] = 1;
				$res = M('intro') ->where($where)->save($data);
				//dump($res);
				if ($res !== false) {
					$this->success('数据修改成功！',__APP__.'/Intro/index');
				}else{
					$this->error('数据修改失败！');
				}
			}else{
				$this->assign('intro',$intro);
				$this->display();
			}
		}
	}