<?php


namespace App\Controllers;

use App\Models\Actions as ActionsModel;

class Actions extends \Core\LoginController
{
	public function likeAction()
	{
		$like = new ActionsModel($_POST);
		$res = $like->setUserLike();
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
