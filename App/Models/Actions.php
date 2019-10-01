<?php


namespace App\Models;

use PDO;

class Actions extends \Core\Model
{
    private $user_email;
    private $user_id;

    public function __construct($params)
    {
        $this->user_email = json_decode($params['data']);
    }

    public function setUserLike($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $like = $db->prepare("UPDATE user_action SET liked = 'liked' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
            $res = $like->execute([$this->user_id, $user['id']]);
            if ($res) {
                $match = $db->prepare("SELECT liked FROM user_action WHERE first_user = ? AND second_user = ?");
                $match->execute([$this->user_id, $user['id']]);
                $res_1 = $match->fetchColumn();
                if ($res_1) {
                    $match = $db->prepare("SELECT liked FROM user_action WHERE first_user = ? AND second_user = ?");
                    $match->execute([$user['id'], $this->user_id]);
                    $res_2 = $match->fetchColumn();
                    if ($res_1 === $res_2) {
                        $matched_1 = $db->prepare("UPDATE user_action SET matched = 'matched' WHERE first_user = ? AND second_user = ?");
                        $matched_1->execute([$this->user_id, $user['id']]);

                        $matched_2 = $db->prepare("UPDATE user_action SET matched = 'matched' WHERE first_user = ? AND second_user = ?");
                        $matched_2->execute([$user['id'], $this->user_id, ]);
                    }
                }

            }
        }
        return true;
    }

    public function setUserUnLike($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $un_like = $db->prepare("UPDATE user_action SET liked = 'none' WHERE first_user = ? AND second_user = ?");
            $res = $un_like->execute([$this->user_id, $user['id']]);
            if ($res){
                $matched_1 = $db->prepare("UPDATE user_action SET matched = 'none' WHERE first_user = ? AND second_user = ?");
                $matched_1->execute([$this->user_id, $user['id']]);

                $matched_2 = $db->prepare("UPDATE user_action SET matched = 'none' WHERE first_user = ? AND second_user = ?");
                $matched_2->execute([$user['id'], $this->user_id, ]);
            }
        }
    }

    public function banUser($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $like = $db->prepare("UPDATE user_action SET ban = 'ban' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
            $like->execute([$this->user_id, $user['id']]);
        }
        return true;
    }

    public function unBanUser($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $like = $db->prepare("UPDATE user_action SET ban = 'none' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
            $like->execute([$this->user_id, $user['id']]);
        }
        return true;
    }

    public function fakeUser($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $like = $db->prepare("UPDATE user_action SET fake = 'fake' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
            $like->execute([$this->user_id, $user['id']]);
        }
        return true;
    }

    public function unFakeUser($user)
    {
        $db = static::getDB();

        $get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
        $this->user_id = $get_id->execute([$this->user_email]);
        $this->user_id = $get_id->fetchColumn();

        if ($this->user_id) {
            $like = $db->prepare("UPDATE user_action SET fake = 'none' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
            $like->execute([$this->user_id, $user['id']]);
        }
        return true;
    }
}
