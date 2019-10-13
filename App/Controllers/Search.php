<?php


namespace App\Controllers;

use App\Models\Search as SearchModel;
use App\Models\User;
use Core\View;

class Search extends \Core\LoginController
{
    public function indexAction()
    {
        $user = $this->before();

        if (!$user) {
            return;
        }

        View::render('Search/index.php');
    }

    public function getResultsAction()
    {
        $search = new SearchModel();
        $search->getResults($_POST['data']);
    }
}
