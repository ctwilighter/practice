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

		public function server(){
			$server_cate = M('server_cate') -> select();
			$this -> assign('server_cate',$server_cate);
			//dump($server_cate);

			$server = M('server') -> select();
			$this -> assign('server',$server);
			//dump($server);


			$this -> display();
		}
	}