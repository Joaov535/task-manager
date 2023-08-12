<?php

use core\Router;
use src\controllers\TaskController;

$router = new Router();

// Home
$router->get('/', 'HomeController@index');

// Register
$router->get('/signUp', 'UserController@signUp');
$router->post('/signUp', 'UserController@addUser');

// Login
$router->post('/signIn', 'UserController@login');
$router->get('/tasks', 'TaskController@tasks');

// Tasks
$router->get('/makeTask', 'TaskController@makeTask');
$router->post('/makeTask', 'TaskController@addTask');