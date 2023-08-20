<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller
{

    public function signin()
    {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function signinAction()
    {
        $userName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $userPass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($userName && $userPass) {

            $loginHandler = new LoginHandler();
            $token = $loginHandler->verifyLogin($userName, $userPass);

            if ($token) {

                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'Login e/ou senha inválidos!';
                $this->redirect('/login');
            }
        }

        $this->redirect('/login');
    }
}
