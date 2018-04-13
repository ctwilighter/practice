<?php 
namespace app\api\controller;
use think\Controller;

/**
* 
*/
class Category extends Controller
{
	public function getCategoryByParentId()
	{
		$id = input('post.id');
		if (!$id) {
			$this->error('ID不合法');
		}
		// 通过ID获取二级城市
		$categorys = model('Category')-> getNormalCategoryByParentId($id);
		if (!$categorys) {
			return show(0,'error',$id);
		}
		return show(1,'success',$categorys);
	}
}