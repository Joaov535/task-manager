<?php

namespace src\handlers;

use \src\models\User;

class LoginHandler
{

    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            $userLogged = new User();
            $userLogged->setUserId($data['id']);
            $userLogged->setUserName($data['username']);
            $userLogged->setUserPassword($data['userpassword']);

            return $userLogged;
        }

        return false;
    }
}
