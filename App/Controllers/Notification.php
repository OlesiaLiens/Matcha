<?php


namespace App\Controllers;
use App\Models\Notification as NotificationModel;
use Core\View;

class Notification extends \Core\LoginController
{
	public function indexAction()
	{
		View::render('Notification/index.php');
	}

	public function getcountersAction() {
		$notification = new NotificationModel();
		$notification->getCounters();
	}
}
