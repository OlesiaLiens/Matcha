<?php


namespace App\Controllers;


use Core\View;

class Notification extends \Core\LoginController
{
	public function indexAction()
	{
		View::render('Notification/index.php');
	}
}
