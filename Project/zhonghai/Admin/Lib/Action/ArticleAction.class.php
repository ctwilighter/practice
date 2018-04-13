<?php 

	/**
	* 
	*/
	class ArticleAction extends PublicAction
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{

			//$news = M('news') -> select();
			//$res = $this->assign('news',$news);
			//dump($news);
			import('ORG.Util.Page');
			$count = M('news') -> count();
			$page = new Page($count,10);
			$show = $page ->show();
			$list = M('news') -> limit($page ->firstRow.','.$page ->listRows) ->order('id desc') ->select();
			$this ->assign('news',$list);
			$this ->assign('page',$show);
			$this->display();
		}

		public function add()
		{
			$data = I('post.');
			$data['time'] = time();
			//dump($data);
			if ($data['title'] && $data['desc'] && $data['content']) {
				$res = M('news') -> add($data);
				//dump($res);
				if ($res !== false) {
					$this->success('上传成功了哦,去文章列表看看吧！',__APP__.'/Article/index');
				}else{
					$this->error('上传失败了呢，回去修改再来吧！',__APP__.'/Article/edit');
				}
			}else{
				$this->display();
			}
		}

		public function edit()
		{
			$data = I('post.');
			$id = $_GET['id'];
			$where['id'] = $id;
			//dump($data);
			if ($data['title'] && $data['desc'] && $data['content']) {
				$res = M('news') -> where($where)-> save($data);
				//dump($res);
				if ($res !== false) {
					$this->success('上传成功了哦,去文章列表看看吧！',__APP__.'/Article/index');
				}else{
					$this->error('上传失败了呢，回去修改再来吧！',__APP__.'/Article/edit');
				}
			}else{
				
				$news = M('news') -> where($where) ->find();
				$res = $this->assign('news',$news);
				//dump($data);
				$this->display();
			}
		}

		public function del()
		{
			$id = $_GET['id'];
			$where['id'] = $id;
			$res = M('news') -> where($where) -> delete(); 
			if ($res !== false) {
				$this->success('已删除成功',__APP__.'/Article/index');
			}else{
				$this->error('删除未成功，壮士需努力！',__APP__.'/Article/index');
			}
		}
	}