<?php 
namespace app\common\model;
use think\Model;

/**
* 商户模块相关模型操作
*/
class Bis extends Model
{
	protected $autoWriteTimestamp = true;
	public function add($data)
	{
		$data['status'] = 0;
		$this -> save($data);
		return $this->id;
	}
}