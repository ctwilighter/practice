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

		public function cases(){
			import('ORG.Util.Page');
			$count = M('cases') ->count();
			$page = new Page($count,8);
			$show = $page ->show();
			$list = M('cases') -> limit($page ->firstRow.','.$page ->listRows) ->select();
			$this->assign('page',$show);
			$this->assign('cases',$list);
			//dump($cases);
			$this->display();
		}
	}