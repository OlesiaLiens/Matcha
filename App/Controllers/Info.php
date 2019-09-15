<?php


namespace App\Controllers;


use Core\View;

class Info extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}
		View::getTemplate('Info/index.php');
	}
}
