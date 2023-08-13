<?php

namespace src\controllers;

use \core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['UserLogged'])) {
            $this->render('home');
        } else {

            $this->redirect('/tasks');
        }
    }

    public function teste()
    {
        $this->render('teste');
    }
}
