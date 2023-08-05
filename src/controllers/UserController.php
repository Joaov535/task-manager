<?php

namespace src\controllers;

use \core\Controller;
use \src\models\RegisteredUser;
use \src\models\AddUser;
use \src\models\User;


class UserController extends Controller
{

    public function signUp()
    {
        $this->render('signUp');
    }

    public function addUser()
    {

        $inputUsername = filter_input(INPUT_POST, 'username');
        $inputPassword = filter_input(INPUT_POST, 'password');
        $cripPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
        $checkRegistration = RegisteredUser::vefifyNameUser($inputUsername);

        if ($checkRegistration) {

            $_SESSION['RegMsg'] = 'Nome de usuário em uso';
            $this->redirect('/signUp');
        } else {
            User::insert([
                'username' => $inputUsername,
                'password' => $cripPassword
            ])
                ->execute();

            $_SESSION['RegMsg'] = 'Usuário cadastrado com sucesso!';
            $this->redirect('/');
        }
    }

    public function login()
    {

    }
}
