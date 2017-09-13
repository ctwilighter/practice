<?php 

/**
* 
*/
class ServerAction extends PublicAction
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		import('ORG.Util.Page');
		$count = M('server') -> count();
		$page = new Page($count,8);
		$show = $page ->show();
		//$list = M('news') -> limit($page ->firstRow.','.$page ->listRows) ->select();
		$list = M() ->table(array('zh_server' =>'server' ,'zh_server_cate' =>'cate')) -> limit($page ->firstRow.','.$page ->listRows) ->where('server.cid = cate.cid') ->select();
		$this ->assign('server',$list);
		$this ->assign('page',$show);
		//dump($list);
		//$this ->assign('server',$server);
		$this->display();
	}

	public function add()
	{
		$cate = M('server_cate') ->select();
		$this ->assign('cate',$cate);
		$this->display();
	}

	public function edit()
	{
		$id = $_GET['id'];
		$where['id'] = $id;
		//$where['_string'] = 'server.cid = cate.id';
		$server = M('server') ->join('join zh_server_cate On zh_server_cate.cid = zh_server.cid') ->where($where) ->find();
		$cate = M('server_cate') ->select();
		// dump($id);
		// dump($server);
		if ($server) {
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
					$img = $server['image'];
					$imgurl = '.'.substr($img, 8);
					//dump($imgurl);
					unlink($imgurl);
					$info = $upload ->getUploadFileInfo();
					$data['image'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
					$res = M('server') ->where($where)-> save($data);
					if ($res !== false) {
						$this->success('数据上传成功',__APP__.'/Server/index');
					}else{
						$this->error('数据上传失败');
					}
					//dump($data);
					// dump($info);
				}
			}else{
				$this->assign('cate',$cate);
				$this->assign('server',$server);
				$this->display();
			}
		}else{
			$this->error('未获得数据！');
		}
	}

	public function del()
	{
		$id = I('get.id');
		$where['id'] = $id;
		$data = M('server') ->where($where) ->find();
		$img = $data['image'];
		$imgurl = '.'.substr($img,8);
		$res = M('server') ->where($where) ->delete();
		if ($res !== false) {
			unlink($imgurl);
			$this->success('数据删除成功');
		}else{
			$this->error('数据删除失败');
		}
	}

	public function add_cate()
	{
		$data = I('post.');
		if($data){
			//dump($data);
			$res = M('server_cate') ->add($data);
			if ($res !== false) {
				$this->success('添加成功',__APP__.'/Server/cate');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->display();
		}
	}

	public function edit_cate()
	{
		$id = I('get.id');
		//dump($id);
		$where['cid'] = $id;
		$cate = M('server_cate') ->where($where) ->find();
		//dump($cate);
		$this->assign('cate',$cate);
		$data = I('post.');
		if($data){
			dump($data);
			$res = M('server_cate') ->where($where) ->save($data);
			if ($res !== false) {
				$this->success('修改成功',__APP__.'/Server/cate');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->display();
		}
	}

	public function del_cate()
	{
		$id = I('get.id');
		$where['cid'] = $id;
		$res = M('server_cate') ->where($where) ->delete();
		if ($res !== false) {
			$this->success('数据删除成功');
		}else{
			$this->error('数据删除失败');
		}
	}

	public function cate()
	{
		$cate = M('server_cate') ->select();
		$this ->assign('cate',$cate);
		//dump($cate);
		$this->display();
	}

	public function upload()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload -> maxSize = 314528;
		$upload -> allowExts = array('jpg','png','gif','jpeg');
		$upload -> savePath = 'Public/Uploads/image/';
		$data = $_POST;
		if(!$upload -> upload()){
			$this -> error($upload->getErrorMsg());
		}else{
			$info = $upload ->getUploadFileInfo();
			$data['image'] = '__ROOT__/'.$info[0]['savepath'].$info[0]['savename'];
			$res = M('server') -> add($data);
			if ($res !== false) {
				$this->success('数据上传成功',__APP__.'/Server/index');
			}else{
				$this->error('数据上传失败');
			}
			//dump($data);
			// dump($info);
		}
	}
}