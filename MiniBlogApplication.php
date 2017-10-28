<?php

class MiniBlogApplication extends Application
{
	protected $login_action = array('account', 'signin');

	public function getRootDir()
	{
		return dirname(__FILE__);
	}

	protected function registerRouters()
	{
		return array(
			'/'
				=> array('controller' => 'status', 'action' => 'index'),
			'/status/post'
				=> array('controller' => 'status', 'action' => 'post'),
			'/user/:user_name'
				=> array('controller' => 'status', 'action' => 'user'),
			'/user/:user_name/status/:id'
				=> array('controller' => 'status', 'action' => 'show'),
			'/account'
				=> array('controller' => 'account', 'action' => 'index'),
			'/account/:action'
				=> array('controller' => 'account'),
			'/follow'
				=> array('controller' => 'account', 'action' => 'follow'),
			'/friend'
			=> array('controller' => 'friend', 'action' => 'index'),
			'/friend/search'
			=> array('controller' => 'friend', 'action' => 'search'),
		);
	}

	protected function configure()
	{
		$this->db_manager->connect('master', array(
				'dsn' => 'mysql:dbname=mini_blog;host=localhost',
				'user' => 'root',
				'password' => '',
		) );
	}

}

?>