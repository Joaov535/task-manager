<?php

namespace src\controllers;

use \core\Controller;
use Exception;
use \src\models\AddUser;
use src\models\CheckUser;
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
        $checkRegistration = CheckUser::verifyUserExist($inputUsername);

        if ($checkRegistration) {

            $_SESSION['RegMsg'] = 'Nome de usuário em uso';
            $this->redirect('/signUp');
        } else {

            $cripPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
            try {
            User::insert([
                'username' => $inputUsername,
                'password' => $cripPassword
            ])
                ->execute();
            } catch(Exception $e) {
                $_SESSION['err'] = $e->getMessage();
                $this->redirect('/signUp');
            }
            $_SESSION['RegMsg'] = 'Usuário cadastrado com sucesso!';
            $this->redirect('/');
        }
    }

    public function login()
    {
        $inputUsername = filter_input(INPUT_POST, 'username');
        $inputPassword = filter_input(INPUT_POST, 'password');

        $checkRegistration = CheckUser::verifyUserExist($inputUsername);
        $checkPassword = CheckUser::vefifyPassUser($inputPassword, $checkRegistration['password']);

        if($checkRegistration && $checkPassword) {

            $_SESSION['UserLogged'] = $checkRegistration;
            $this->redirect('/tasks');
        } else {

            $_SESSION['LoginMsg'] = 'Usuário ou senha inválidos';
            $this->redirect('/');
        }
    }

    public function logout() 
    {
        unset($_SESSION['UserLogged']);
        $this->redirect('/');
    }
}
