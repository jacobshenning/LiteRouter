<?php

require '../src/Router.php';
require 'Controller.php';

//  Setup Router
$router = new \LiteRouter\Router();

//  Use a Controller
$controller = new Controller();

//  Make Routes
$router->map( 'GET', '/', $controller->home(), false, 'home');

//  Match Routes
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}