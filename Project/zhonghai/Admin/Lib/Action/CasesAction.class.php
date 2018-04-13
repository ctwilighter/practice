<?php 

/**
* 
*/
class CasesAction extends PublicAction
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		import('ORG.Util.Page');
		$count = M('cases') -> count();
		$page = new Page($count,6);
		$show = $page ->show();
		$list = M('cases') -> limit($page ->firstRow.','.$page ->listRows) ->select();
		$this ->assign('cases',$list);
		$this ->assign('page',$show);
		$this->display();
	}

	public function add()
	{
		$data = I('post.');
		if ($data) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload -> maxSize = 341528;
			$upload -> allowExts = array('jpeg','jpg','png','gif');
			$upload -> savePath = 'Public/Uploads/image/';
			if (!$upload ->upload()) {
				$this -> error($upload ->getErrorMsg());
			}else{
				$info = $upload -> getUploadFileInfo();
				$data['image'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
				$res = M('cases') ->add($data);
				if ($res !== false) {
					$this ->success('添加成功',__APP__.'/Cases/index');
				}else{
					$this ->error('添加失败');
				}
			}
		}else{
			$this->display();
		}
	}

	public function edit()
	{
		$id = I('get.id');
		$where['id'] = $id;
		$data = I('post.');
		$case = M('cases') ->where($where) ->find();
		//dump($data);
		if ($data) {
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload -> maxSize = 314528;
			$upload -> allowExts = array('jpg','jpeg','png','gif');
			$upload -> savePath = './Public/Uploads/image/';
			if (!$upload ->upload()) {
				$this -> error($upload ->getErrorMsg());
			}else{
				$img = $case['image'];
				$imgurl = '.'.substr($img,8);
				unlink($imgurl);
				$info = $upload -> getUploadFileInfo();
				$data['image'] = '__ROOT__'.$info[0]['savepath'].$info[0]['savename'];
				$res = M('cases') -> where($where) ->save($data);
				if ($res !== false) {
					$this->success('修改成功',__APP__.'/Cases/index');
				}else{
					$this->error('修改失败');
				}
			}
		}else{
			$this->assign('case',$case);
			$this->display();
		}
	}

	public function del()
	{
		$id = I('get.id');
		$where['id'] = $id;
		$case = M('cases') ->where($where) ->find();
		$img = $case['image'];
		$imgurl = '.'.substr($img,8);
		unlink($imgurl);
		$res = M('cases') ->where($where) ->delete();
		if ($res !== false) {
			$this ->success('删除成功');
		}else{
			$this ->error('删除失败');
		}
	}

	public function editsort()
	{
		$id = $_POST['id'];
		$number = $_POST['number'];
		$where['id'] = $id;
		$data['sort'] = $number;
		$res = M('cases')->where($where)->save($data);
		$case = M('cases')->where($where)->find();
		$this->ajaxReturn($case);
	}
}