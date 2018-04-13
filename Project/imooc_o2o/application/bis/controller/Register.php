<?php
namespace app\bis\controller;
use think\Controller;

class Register extends Controller
{
	public function index()
	{
		$citys = model('City') -> getNormalCitysByParentId();
		$categorys = model('Category') -> getNormalCategoryByParentId();
		// dump($citys);
		return $this->fetch('',[
			'citys' => $citys,
			'categorys' => $categorys,
		]);
	}

	public function add()
	{
		if (!request()->isPost()) {
			$this->error('请求错误');
		}
		// 获取表单数据
		$data = input('post.');
		// 校验数据
		// $validate = validate('Bis');
		// if (!$validate->scene('add')->check($data)) {
		// 	$this->error($validate->getError());
		// }
		// 获取经纬度
		$lnglat = \Map::getLngLat($data['address']);
		if (empty($lnglat) || $lnglat['status'] !=0 || $lnglat['result']['precise'] !=1) {
			$this->error('无法获得地址数据，或者匹配的地址不精确！');
		}

		// 商户基本信息入库
		$bisData = [
			'name' => $data['name'],
			'city_id' => $data['city_id'],
			'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['se_city_id'],
			'logo' => $data['logo'],
			'licence_logo' => $data['licence_logo'],
			'description' => empty($data['description']) ? '' : $data['description'],
			'bank_info' => $data['bank_info'],
			'bank_user' => $data['bank_user'],
			'bank_name' => $data['bank_name'],
			'faren' => $data['faren'],
			'faren_tel' => $data['faren_tel'],
			'email' => $data['email'],
		];
		$bisId = model('Bis') ->add($bisData);
		// 总店相关信息检验
		if (!empty($data['se_category_id'])) {
			$data['cat'] = implode('|',$data['se_category_id']);
		}
		// 总店相关信息入库
		$locationData = [
			'bis_id' => $bisId,
			'name' => $data['name'],
			'tel' => $data['tel'],
			'contact' => $data['contact'],
			'category_id' => $data['category_id'],
			'category_path' => $data['category_id'].','.$data['cat'],
			'city_id' => $data['city_id'],
			'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
			'address' => $data['address'],
			'open_time' => $data['open_time'],
			'content' => empty($data['content']) ? '' : $data['content'],
			'is_man' => $data['is_man'],
			'name' => $data['name'],
			'name' => $data['name'],
		];
	}
}