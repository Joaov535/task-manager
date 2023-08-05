<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/signUp', 'UserController@signUp');
$router->post('/signUp', 'UserController@addUser');
$router->post('/signIn', 'UserController@login');
