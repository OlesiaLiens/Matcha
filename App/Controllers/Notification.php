<?php


namespace App\Controllers;

use App\Models\Notification as NotificationModel;
use Core\View;

class Notification extends \Core\LoginController
{
    public function indexAction()
    {
//        $user = $this->before();
//
//        if (!$user) {
//            return;
//        }

        View::render('Notification/index.php');
    }

    public function getCountersAction()
    {
        $notification = new NotificationModel();
        $notification->getCounters();
    }

    public function getInteractorAction($param)
    {
        $notification = new NotificationModel();


        if ($param === 'see') {
            $notification->getSee();
        }
        if ($param === 'like') {
            $notification->getLike();
        }

        if ($param === 'match') {
            $notification->getMatch();
        }
    }
}
