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

// Login / Logout
$router->post('/signIn', 'UserController@login');
$router->get('/logout', 'UserController@logout');

// Tasks
$router->get('/tasks', 'TaskController@tasks');
$router->get('/makeTask', 'TaskController@makeTask');
$router->post('/makeTask', 'TaskController@addTask');
$router->get('/editTask', 'TaskController@editTask');
$router->post('/editTask', 'TaskController@editTaskAction');
$router->get('/delete', 'TaskController@delete');