<?php


namespace App\Controllers;
use Core\View;

class Search extends \Core\LoginController
{
	public function indexAction()
	{
		View::render('Search/index.php');
	}
}

//todo вывести юзеров в тимплейт с базы через params
//todo при клике на юзера переходить на его аккаунт (пример как в камагру)
