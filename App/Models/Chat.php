<?php

namespace App\Models;

class Chat extends \Core\Model
{
	private $id_chat;
	private $counterpart_id;
	private $first_name;
	private $last_name;
	private $avatar;
	private $last_online;
	private $messages = [];


	public function __construct($params)
	{
		$this->id_chat = json_decode($params['id']);
		$this->counterpart_id = json_decode($params['counterpart_id']);
		$this->first_name = json_decode($params['first_name']);
		$this->last_name = json_decode($params['last_name']);
		$this->avatar = json_decode($params['avatar']);
		$this->last_online = json_decode($params['last_online']);
		$this->messages = json_decode($params['messages']);
	}

	public function getDialogue()
	{
		$db = static::getDB();

	}
}
