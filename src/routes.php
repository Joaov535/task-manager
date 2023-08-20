<?php

use core\Router;
use src\controllers\HomeController;
use src\controllers\TaskController;

$router = new Router();

$router->get('/teste', 'HomeController@teste');

// Home
$router->get('/', 'HomeController@index');
