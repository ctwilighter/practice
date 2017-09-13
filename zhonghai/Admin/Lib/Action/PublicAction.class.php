<?php 


 /**
 * 
 */
 class PublicAction extends CommonAction
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->loginCheck();
 	}

 	public function loginCheck(){
		if (!$_SESSION['adminid'] || !$_SESSION['adminname']) {
			$this->error('请先登录！',__APP__.'/Login/login',1);
			exit;
		}
	}

 	
 }