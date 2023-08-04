<?php

namespace src\controllers;

use \core\Controller;
use \src\models\RegisteredUser;
use \src\models\AddUser;

class UserController extends Controller
{

    public function signUp()
    {
        $this->render('signUp');
    }

    public function addUser()
    {   

        $inputUsername = filter_input(INPUT_POST, 'username');
        $inputPassword = filter_input(INPUT_POST, 'username');

        
    }
}
