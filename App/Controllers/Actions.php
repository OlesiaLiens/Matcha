<?php


namespace App\Controllers;

use App\Models\Actions as ActionsModel;

class Actions extends \Core\LoginController
{
    public function likeAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $like = new ActionsModel($_POST);
        $res = $like->setUserLike($user);
        if ($res)
            return;
    }

    public function unLikeAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $un_like = new ActionsModel($_POST);
        $res = $un_like->setUserUnLike($user);
        if ($res)
            return;
    }

    public function banAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $ban = new ActionsModel($_POST);
        $res = $ban->banUser($user);
        if ($res)
            return;
    }

    public function unBanAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $ban = new ActionsModel($_POST);
        $res = $ban->unBanUser($user);
        if ($res)
            return;
    }

    public function fakeAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $ban = new ActionsModel($_POST);
        $res = $ban->fakeUser($user);
        if ($res)
            return;
    }

    public function unFakeAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        $ban = new ActionsModel($_POST);
        $res = $ban->unFakeUser($user);
        if ($res)
            return;
    }
}
