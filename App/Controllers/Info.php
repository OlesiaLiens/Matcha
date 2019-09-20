<?php


namespace App\Controllers;

use App\Models\Info as InfoModel;

use Core\View;

class Info extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}
		$info = new InfoModel($user);
		$params = $info->get_tags_from_base();

		View::getTemplate('Info/index.php', $params);
	}

	public function infoAction()
	{
		session_start();
		View::getTemplate('Info/index.php');

		if (isset($_POST['submit']) && $_POST['submit'] === 'OK') {
			$info = new InfoModel($_POST);
			$info->save_user_info($_SESSION['user_id']);
		}
	}
}
