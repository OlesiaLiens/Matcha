<?php

namespace App\Controllers;

use App\Models\Photo;
use Core\View;

class Account extends \Core\LoginController
{

	public function indexAction()
	{
		if (!$this->before()) {
			return;
		}
		View::getTemplate('Account/index.php');
	}
}
