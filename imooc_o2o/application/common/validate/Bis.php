<?php 
namespace app\common\validate;
use think\Validate;

/**
* bis校验器
*/
class Bis extends Validate
{
	protected $rule = [
		['name','require|max:25','商户名称必须填写|最大字符长度为25'],
		['email','email'],
		['logo','require'],
		['city_id','require'],
		['bank_info','require'],
		['bankname','require'],
		['faren','require'],
		['faren_tel','require'],
	];

	protected $scene = [
		'add' => ['name','email','logo','city_id','bank_info','bankname','faren','faren_tel'],
	];
}