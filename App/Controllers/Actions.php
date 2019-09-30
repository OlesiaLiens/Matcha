<?php


namespace App\Controllers;

use App\Models\Actions as ActionsModel;

class Actions extends \Core\LoginController
{
	public function likeAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}

		$like = new ActionsModel($_POST);
		$res = $like->setUserLike($user);
		if ($res)
			return;
	}

	public function unLikeAction($params)
	{

	}

	public function banAction($params)
	{

	}

	public function unBanAction($params)
	{

	}
}
