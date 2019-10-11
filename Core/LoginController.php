<?php

namespace Core;

use App\Models\User;

abstract class LoginController extends Controller
{
    protected function before()
    {
        $res = false;
        session_start();
        if (isset($_SESSION['user_id'])) {
            $user = new User(0, $_SESSION['user_id']);
            $res = $user->get_user();
        }
        if (!$res) {
            View::getTemplate('Errors/403error.php');
        }
        return $res;
    }

    protected function userActions($id)
    {
        $res = false;
//		session_start();
        if (isset($_SESSION['user_id'])) {
            $user = new User(0, $_SESSION['user_id']);
            $res = $user->get_user_actions($id);
        }
//        if (!$res) {
//            View::getTemplate('Errors/403error.php');
//        }
        return $res;
    }

    protected function get_ban($id)
    {
        $ban = false;
        if (isset($_SESSION['user_id']))
        {
            $user = new User(0, $_SESSION['user_id']);
            $ban = $user->get_ban($id);
        }
//        if (!$ban) {
//            View::getTemplate('Errors/403error.php');
//        }
        return $ban;
    }
}
