<?php

use core\Router;
use src\controllers\HomeController;
use src\controllers\TaskController;

$router = new Router();

$router->get('/teste', 'HomeController@teste');

// Home
$router->get('/', 'HomeController@index');

// Login
$router->get('/signin', 'LoginController@signin');
$router->post('/signin', 'LoginController@signinAction');