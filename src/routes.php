<?php

use core\Router;
use src\controllers\HomeController;
use src\controllers\TaskController;

$router = new Router();

$router->get('/teste', 'HomeController@teste');

// Home
$router->get('/', 'HomeController@index');

// Register
$router->get('/signUp', 'UserController@signUp');
$router->post('/signUp', 'UserController@addUser');

// Login
$router->post('/signIn', 'UserController@login');
$router->get('/tasks', 'TaskController@tasks');

// Logout
$router->get('/logout', 'UserController@logout');

// Tasks
$router->get('/makeTask', 'TaskController@makeTask');
$router->post('/makeTask', 'TaskController@addTask');
$router->get('/editTask', 'TaskController@editTask');