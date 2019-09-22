<?php


namespace App\Controllers;

use Core\View;

class Chat extends \Core\LoginController
{
	public function indexAction()
	{
		View::render('Chat/index.php');
	}
}
