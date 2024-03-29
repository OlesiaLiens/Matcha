<?php

namespace App\Models;

use PDO;

class User extends \Core\Model
{
    private $email;
    private $user_id;

    public function __construct($email, $user_id = 0)
    {
        $this->email = $email;
        $this->user_id = $user_id;
    }

    public function changeId()
    {
        if ($this->get_id()) {
            $this->set_id();
            return true;
        }
        return false;
    }

    private function get_id()
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM `users` WHERE  email = ?");
        $get_id->execute([$this->email]);
        $row = $get_id->fetchColumn();
        if ($row) {
            $this->user_id = $row;
            return true;
        } else {
            return false;
        }
    }

    private function set_id()
    {
        try {
            $db = static::getDB();

            $insert = $db->prepare("UPDATE tokens
						set user_id = ?");
            $insert->execute([$this->user_id]);
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function get_user()
    {
        $db = static::getDB();

        $user = $db->prepare("SELECT * FROM `users` WHERE  id = ?");
        $user->execute([$this->user_id]);
        $user = $user->fetch(PDO::FETCH_ASSOC);

        if ($user)
            return $user;
        else
            return false;
    }

    public function get_id_tags()
    {
        $db = static::getDB();

        $teg_id = $db->prepare("SELECT * FROM `users_tags` WHERE  user_id = ? ORDER BY DATE DESC");
        $teg_id->execute([$_SESSION['user_id']]);
        $res = $teg_id->fetchAll(PDO::FETCH_ASSOC);

        if ($res)
            return $res;
        else
            return false;
    }

    public function get_all_tags($tags_id)
    {
        $db = static::getDB();

        $tags = $db->prepare("SELECT tag FROM `tags` WHERE  id = ?");
        $tags->execute([$tags_id]);
        $tags = $tags->fetchColumn();

        if ($tags)
            return $tags;
        else
            return false;
    }

    public function online_status()
    {
        $db = static::getDB();

        $online = $db->prepare("UPDATE users SET online = 0, last_see = CURRENT_TIMESTAMP  WHERE id = ?");
        $online->execute([$this->user_id]);

    }

    public function get_user_actions($id)
    {
        $db = static::getDB();

        $action = $db->prepare("SELECT * FROM `user_action` WHERE first_user = ? AND second_user = ?");
        $action->execute([$id['id'], $this->user_id]);
        $action = $action->fetchAll(PDO::FETCH_ASSOC);

        if ($action)
            return $action;
        else {
            $action = $db->prepare("SELECT * FROM `user_action` WHERE first_user = ? AND second_user = ?");
            $action->execute([$this->user_id, $id['id']]);
            $action = $action->fetchAll(PDO::FETCH_ASSOC);
            return $action;
        }
    }

    public function get_ban($id)
    {
        $db = static::getDB();

        $action = $db->prepare("SELECT * FROM `user_action` WHERE second_user = ? AND ban = 'ban'");
        $action->execute([$id['id']]);
        $action = $action->fetchAll(PDO::FETCH_ASSOC);

        if ($action)
            return $action;

        if (!$action) {
            $action = $db->prepare("SELECT * FROM `user_action` WHERE first_user = ? AND ban = 'ban'");
            $action->execute([$id['id']]);
            $action = $action->fetchAll(PDO::FETCH_ASSOC);
            if ($action)
                return $action;
        }
    }
}
