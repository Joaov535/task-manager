<?php

namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $loginHandler = new LoginHandler();
        $this->loggedUser = $loginHandler->checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('index');
    }
}
