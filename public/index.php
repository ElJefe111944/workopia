<?php

require '../helper.php';
require basePath('Router.php');
require basePath('Database.php');

// instatiating router
$router = new Router();
// get routes
$routes = require basePath('routes.php');
// get current uri and http method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
// route the rqeuest
$router->route($uri, $method);