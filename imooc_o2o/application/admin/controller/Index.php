<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function test()
    {
    	\Map::getLngLat('北京昌平沙河地铁');
    	return "this is admin index test";
    }

    public function map()
    {
    	return \Map::staticimage('北京昌平沙河地铁');
    }

    public function welcome()
    {
    	// \phpmailer\Email::send('c_twilighter@qq.com','点开看看','I Love You Forever');
    	return "欢迎来到o2o主后台首页！";
    }
}
