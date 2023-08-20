<?php
namespace src\models;

use \core\Model;

class User extends Model {

    private $id;
    private $userName;
    private $userPassword;
    private $token;

    public function getUserId()
    {
        return $this->id;
    }

    public function setUserId($id)
    {
        $this->$id = $id;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($name)
    {
        $this->userName = $name;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserPassword($pw)
    {
        $this->userPassword = $pw;
    }

    public function getUserToken()
    {
        return $this->token;
    }

    public function setUsertoken($name, $email)
    {
        $this->token = md5(time().rand().$name.$email);
    }
}