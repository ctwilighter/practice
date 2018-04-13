<?php
namespace app\admin\controller;
use think\Controller;

class Category extends Controller
{
    public function index()
    {
    	$parentId = input('get.parent_id', 0 , 'intval');
    	$categorys = model('Category') -> getFirstCategorys($parentId);
        return $this->fetch('',['categorys' => $categorys]);
    }

    public function add()
    {
    	$categorys = model('Category') ->getNormalFirstCategory();
    	return $this->fetch("",['categorys'=>$categorys]);
    }

    public function save()
    {
    	//dump($_POST);
    	//print_r(input('post.'));
    	//dump(request()->post());
    	$data = input('post.');
    	//$data['status'] = 10;
    	//dump($data);
        /**
        *做下严格的校验
        */
        if (!request()->isPost()) {
            $this->error('请求失败');
        }
        
    	$validate = validate('Category');
    	if (!$validate->scene('add')->check($data)) {
    		$this->error($validate->getError());
    	}
        if (!empty($data['id'])) {
            return $this->update($data);
        }

    	$res = model('Category')->add($data);
    	if ($res !== false) {
    		$this->success('新增成功');
    	}else{
    		$this->error('新增失败');
    	}
    }

    public function edit($id = 0)
    {
        if (intval($id) < 0) {
            $this->error('参数不合法');
        }
        $category = model('Category')->get($id);
        //print_r($category);exit;
        $categorys = model('Category') ->getNormalFirstCategory();
        return $this->fetch("",[
            'categorys'  => $categorys,
            'category'   => $category,
        ]);
    }

    public function update($data)
    {
        $res = model('Category')->save($data,['id' => intval($data['id'])]);
        if ($res) {
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }

    public function listorder($id,$listorder)
    {
        $res = model('Category') ->save(['listorder'=>$listorder],['id'=>$id]);
        if ($res) {
            $this->result($_SERVER['HTTP_REFERER'], 1, 'success');
        }else{
            $this->result($_SERVER['HTTP_REFERER'], 0, '更新失败');
        }
    }

    public function status()
    {
        $data = input('get.');
        $validate = validate('Category');
        if (!$validate->scene('status')->check($data)) {
            $this->error($validate->getError());
        }
        $res = model('Category')->save(['status'=>$data['status']],['id'=>$data['id']]);
        if ($res) {
            $this->success('状态更新成功');
        }else{
            $this->error('状态更新失败');
        }
    }
}
