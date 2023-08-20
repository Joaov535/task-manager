<?php

namespace src\handlers;

use \src\models\User;

class LoginHandler
{

    public function checkLogin()
    {
        if (!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            $loggedUser = new User();
            $loggedUser->setUserId($data['id']);
            $loggedUser->setUserName($data['username']);
            $loggedUser->setUserPassword($data['userpassword']);

            return $loggedUser;
        }

        return false;
    }

    public function verifyLogin($name, $pw)
    {

        $user = User::select()->where('username', $name)->one();

        if($user) {
            if(password_verify($pw, $user['password'])){
                $token = md5($pw.$name.time().rand(0,9999));
                User::update()->set('token', $token)->where('username', $name)->execute();
                return $token;
            }
        }
        return false;
    }
}
