<?php

class FriendController extends Controller
{
	protected $auth_actions = array('index', 'search');

	public function indexAction()
	{
		$user = $this->session->get('user');
		$followings = $this->db_manager->get('User')->fetchAllFollowingsByUserId($user['id']);

		return $this->render(array(
				'followings' => $followings,
				'param' => '',
				"users" => '',
				'_token' => $this->generateCsrfToken('friend/index'),
		));
	}

	public function searchAction()
	{
		if(!$this->request->isGet()){
			$this->forward404();
		}

		$param= $this->request->getGet('param');

		$errors = array();

		if(!strlen($param)){
			$errors[] = '友達の名前を入力してください';
		}

		$users = null;
		if(count($errors) === 0){
		// TODO 友達検索を実装
			$users = $this->db_manager->get('User')->fetchAllByUserNamePartial($param);
		}

		$user = $this->session->get('user');
		$followings = $this->db_manager->get('User')->fetchAllFollowingsByUserId($user['id']);

		return $this->render(array(
				'errors' => $errors,
				'followings' => $followings,
				'param' => $param,
				'users' => $users,
				'_token' => $this->generateCsrfToken('friend/index'),
		), 'index');
	}


}

?>