<?php

namespace src\controllers;

use \core\Controller;

class LoginController extends Controller
{
    
    public function signin()
    {
        $this->render('login');
    }

    public function signinAction()
    {
        $userName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $userPass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    }
}