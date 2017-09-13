<?php 

	/**
	* 
	*/
	class RecruitAction extends PublicAction
	{
		function __construct()
		{
			parent::__construct();
		}

		public function recruit(){
			$recruit = D('recruit') -> select();
			$this->assign('recruit',$recruit);
			//dump($recruit);
			$this->display();
		}
	}