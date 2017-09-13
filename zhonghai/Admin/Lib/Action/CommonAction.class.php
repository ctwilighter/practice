<?php 

	/**
	* 
	*/
	class CommonAction extends Action
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function verify(){
	 		import('ORG.Util.Image');
			Image::buildImageVerify(4,3);
	 	}
	}
 ?>