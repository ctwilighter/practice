<?php 

	/**
	* 
	*/
	class PublicAction extends Action
	{
		function __construct()
		{
			parent::__construct();
			$this->intro();
		}

		public function intro()
		{
			$intro = M('intro') -> find();
			$this->assign('intro',$intro);
		}
	}