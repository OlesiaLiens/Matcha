<?php


namespace App\Controllers;
use App\Models\Chat as ChatModel;
use Core\View;

class Chat extends \Core\LoginController
{
	public function indexAction()
	{
		View::render('Chat/index.php');
	}

	public function getdialoguesAction() {
		$chat = new ChatModel();
		$chat->getDialogues();
	}
}
