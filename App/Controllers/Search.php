<?php


namespace App\Controllers;

use App\Models\Search as SearchModel;
use App\Models\User;
use Core\View;

class Search extends \Core\LoginController
{
	public function indexAction()
	{
		$this->viewGallery(1);
//		View::render('Search/index.php');
	}

	public function pageAction($page_number)
	{
		if (!(is_numeric($page_number)) || $page_number > 1000 || $page_number < 1) {
			View::getTemplate('Errors/404error.php');
			return;
		}
		$this->viewGallery($page_number);
	}

	private function viewGallery($page_number)
	{
		$params = [];
		session_start();

		$res = false;
		if (isset($_SESSION['user_id'])) {
			$user = new User(0, $_SESSION['user_id']);
			$res = $user->get_user();
		}
		$params['users'] = SearchModel::getUserByPage($page_number);
		$params['users_count'] = SearchModel::getUsersCount();
		$params['page_number'] = $page_number;
		View::getTemplate('Search/index.php', $params, $res);
	}
}

//todo при клике на юзера переходить на его аккаунт (пример как в камагру)
