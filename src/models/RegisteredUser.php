<?php

namespace src\models;

use \core\Model;

class RegisteredUser extends Model
{

    public static function vefifyNameUser(String $name)
    {

        $data = User::select()
            ->where('username', $name)
            ->execute();

        if (count($data) == 0) {

            return false;
        } else {

            return true;
        }
    }

    public static function verifyUser(array $user)
    {
        $data = User::select()
            ->where('username', $user['name'])
            ->where('password', $user['password'])
            ->execute();

        if (count($data) == 0) {

            return false;
        } else {

            return true;
        }
    }
}
