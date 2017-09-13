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

		public function news(){
			// $data = [
			// 	'cid' => 1,
			// 	'title' => '这是一个新闻标题',
			// 	'author' => '程先生',
			// 	'time' => time(), 
			// 	'desc' => '这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，这是一个新闻简介，',
			// 	'content' => '这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，这是一个新闻内容，',
			// ];
			// $res = M('news') -> add($data);
			// dump($res);
			//$news = D('news') -> select();
			$count = M('news') -> where('1=1') -> count();
			//dump($count);
			import('ORG.Util.Page');
			$page = new Page($count, 3);
			$show = $page -> show();
			$list = M('news') -> where('1=1') -> order('id',asc) -> limit($page->firstRow.','.$page->listRows) -> select();
			//$this -> assign('news',$news);
			//dump($list);
			$this -> assign('list',$list);
			$this -> assign('page',$show);
			//dump($news);
			$this->display();
		}
		// public function news_detail(){
		// 	$id = $_GET['id'];
		// 	$up = $_GET['up'];
		// 	$down = $_GET['down'];
		// 	if ($up) {
		// 		$where['id'] = array('LT',$id);
		// 		$data = M('news') ->where($where) ->order("id desc") ->find();
		// 	}elseif ($down) {
		// 		$where['id'] = array('GT',$id);
		// 		$data = M('news') ->where($where) ->order("id asc") ->find();
		// 	}else{
		// 		$where['id'] = $id;
		// 		$data = M('news') -> where($where) -> find();
		// 	}
		// 	if (!$data) {
		// 		$data=M('news')->find();
		// 	}
		// 	//dump($id);
		// 	$this->assign('news',$data);
		// 	$this->display();
		// }
		public function news_detail(){
			$id = $_GET['id'];
			$up = $_GET['up'];
			$down = $_GET['down'];
			if ($up) {
				$where['id'] = array('LT',$id);
				$data = M('news') ->where($where) ->order("id desc") ->find();
			}elseif ($down) {
				$where['id'] = array('GT',$id);
				$data = M('news') ->where($where) ->order("id asc") ->find();
			}else{
				$where['id'] = $id;
				$data = M('news') -> where($where) -> find();
			}
			if (!$data) {
				$data=M('news')->find();
			}
			//dump($id);
			$this->assign('news',$data);
			$this->display();
		}
	}