<?php 

	/**
	* 
	*/
	class RecruitAction extends PublicAction
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data = M('recruit') ->select();
			$this->assign('recruit',$data);
			$this->display();
		}

		public function add()
		{
			$data =I('post.');
			if ($data['title']) {
				$data['time'] = time();
				$res = M('recruit') ->add($data);
				if ($res !== false) {
					$this->success('添加成功',__APP__.'/Recruit/index');
				}else{
					$this ->error('添加失败');
				}
			}else{
				$this->display();
			}
		}

		public function edit()
		{
			$recruit = I('post.');
			$id = I('get.id');
			$where['id'] = $id;
			if (!$recruit['title']) {
				$data = M('recruit') ->where($where) ->find();
				$this->assign('recruit',$data); 
				$this->display();
			}else{
				$recruit['update_time'] = time();
				$res = M('recruit') ->where($where) ->save($recruit);
				if ($res !== false) {
					$this->success('修改成功',__APP__.'/Recruit/index');
				}else{
					$this->error('修改失败');
				}
			}
		}

		public function del()
		{
			$id = I('get.id');
			$where = array('id'=>$id);
			$res = M('recruit') ->where($where) ->delete();
			if ($res !== false) {
				$this->success('删除成功',__APP__.'/Recruit/index');
			}else{
				$this->error('删除失败');
			}
		}
	}