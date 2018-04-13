<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\File;

class Image extends Controller
{
	public function upload()
	{
		$file = Request::instance()->file('file');
		$info = $file ->move('upload');
		if ($info && $info->getPathName()) {
			return show(1,'success','/'.$info->getPathName());
		}else{
			return show(0,'error');
		}
	}	
}