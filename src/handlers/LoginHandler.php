<?php 

namespace src\handlers;

class LoginHandler 
{

    public static function checkLogin($name, $pw)
    {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            
        }
    }
}