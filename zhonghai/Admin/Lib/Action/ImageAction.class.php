<?php 


/**
* 
*/
class ImageAction extends PublicAction
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = M('ads') ->select();
		$this->assign('ads',$data);
		$this->display();
	}

	public function edit()
	{
		$id = $_GET['id'];
		$where['id'] = $id;
		$ads = M('ads') ->where($where) ->find();
		//dump($ads);
		if ($ads) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload -> maxSize = 314528;
			$upload -> allowExts = array('jpg','png','gif','jpeg');
			$upload -> savePath = 'Public/Uploads/image/';
			$data = $_POST;
			if ($data) {
				if(!$upload -> upload()){
					$this -> error($upload->getErrorMsg());
				}else{
					$img = $ads['img'];
					$imgurl = '.'.substr($img,8);
					unlink($imgurl);
					$info = $upload ->getUploadFileInfo();
					$data['image'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
					$res = M('ads') ->where($where)-> save($data);
					if ($res !== false) {
						$this->success('数据上传成功',__APP__.'/Image/index');
					}else{
						$this->error('数据上传失败');
					}
					//dump($data);
					// dump($info);
				}
			}else{
				$this->assign('ads',$ads);
				$this->display();
			}
		}else{
			$this->error('未获得数据！');
		}
	}

	public function add()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload -> maxSize = 314528;
		$upload -> allowExts = array('jpg','png','gif','jpeg');
		$upload -> savePath = 'Public/Uploads/image/';
		$data = $_POST;
		if (!$data['title']) {
			$this->display();
		}else{
			if(!$upload -> upload()){
				$this -> error($upload->getErrorMsg());
			}else{
				$info = $upload ->getUploadFileInfo();
				$data['img'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
				$res = M('ads') -> add($data);
				if ($res !== false) {
					$this->success('数据上传成功',__APP__.'/Image/index');
				}else{
					$this->error('数据上传失败');
				}
				// dump($data);
				// dump($info);
			}
		}
	}

	public function del()
	{
		$id = I('get.id');
		$where['id'] = $id;
		$ads = M('ads') ->where($where) ->find();
		$img = $ads['img'];
		$imgurl = '.'.substr($img,8);
		unlink($imgurl);
		$res = M('ads') ->where($where) ->delete();
		if ($res !== false) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}

	public function edithot()
	{
		$id = $_POST['id'];
		//dump($id);
		$where['id'] = $id;
		$data = M('ads') ->where($where)->find();
		if ($data['ishot'] == 0) {
			$data['ishot'] = 1;
			$msg='隐藏';
		}else{
			$data['ishot'] = 0;
			$msg='显示';
		}
		//$data['ishot'] = 1;
		$res = M('ads')->where($where)->save($data);
		$this-> ajaxReturn($msg);
	}
}