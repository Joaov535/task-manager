<?php
namespace src\controllers;

use \core\Controller;

class TaskController extends Controller {

    public function tasks() {
        $this->render('tasks');
    }

    public function makeTask() {
        $this->render('makeTask');
    }

}