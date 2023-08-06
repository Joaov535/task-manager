<?php

namespace src\models;

use \core\Model;

class RegisteredUser extends Model
{

    public static function verifyUserExist(String $name): array
    {
        $data = User::select()
            ->where('username', $name)
            ->execute();

        if (count($data) == 0) {
            $arr = null;
        } else {
            $arr = $data[0];
        }

        return $arr;
    }

    public static function vefifyPassUser(String $passwordInput, $passwordData): bool
    {
        $pass = password_verify($passwordInput, $passwordData);
        return $pass;
    }
}
