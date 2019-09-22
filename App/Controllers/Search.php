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
