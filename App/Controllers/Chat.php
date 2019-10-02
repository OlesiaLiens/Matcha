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

	public function getavatarAction() {
		$chat = new ChatModel();
		$chat->getAvatar();
	}

	public function sendmessageAction($id) {
		$chat = new ChatModel();
		$chat->sendMessage($id);
	}

	public function getupdatesAction($id) {
	    $chat = new ChatModel();
	    $chat->getUpdates($id);
    }
}
