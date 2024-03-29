<?php


namespace App\Controllers;

use App\Models\Photo as PhotoModel;
use Core\View;

class User extends \Core\LoginController
{
    public function indexAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        if ($user === false) {
            View::getTemplate('Errors/404error.php');
            return;
        }

        $params = [];

        $user_param = new \App\Models\UserProfile($this->route_params);
        $user = $user_param->user_param(); //инфо юзера на страницу которого мы заходим
        $params['id'] = $user['id'];


        $user_param->rating_increment();
        $user_param->who_looked();

        $actions = $this->userActions($user);

        $ban = $this->get_ban($user);
        $params['ban'] = $ban[0]['ban'] ?? 'none';


        $params['first_user'] = $actions[0]['first_user'] ?? 'none';
        $params['second_user'] = $actions[0]['second_user'] ?? 'none';
        $params['see'] = $actions[0]['see'] ?? 'none';
        $params['liked'] = $actions[0]['liked'] ?? 'none';
        $params['matched'] = $actions[0]['matched'] ?? 'none';


        $params['fake'] = $actions[0]['fake'] ?? 'none';

        $params['id'] = $user['id'];
        $params['last_see'] = $user['last_see'];
        $params['online'] = $user['online'];
        $params['email'] = $user['email'];
        $params['username'] = $user['username'];
        $params['first_name'] = $user['first_name'];
        $params['last_name'] = $user['last_name'];
        $params['avatar'] = $user['avatar'];
        $params['rating'] = $user['rating'];
        $params['gender'] = $user['gender'];
        $params['preference'] = $user['preference'];
        $params['location'] = $user['location'];
        $params['bday'] = $user['bday'];
        $params['bio'] = $user['bio'];
        $all_photos = new PhotoModel();
        $params['photos'] = $all_photos->getAllUserPhotos($user['id']);

        View::render('Account/index.php', $params);
    }
}
