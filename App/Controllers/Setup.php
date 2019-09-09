<?php

namespace App\Controllers;

use App\Models\Setup as SetupModel;

use Core\View;

class Setup extends \Core\Controller
{
	public function baseAction()
	{
		$set_up = new SetupModel();
		try {
			$set_up->reinstall();
			View::getTemplate('Setup/Setup.php');
		} catch (\PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
	}
}
