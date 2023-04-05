<?php

session_start();

ini_set('session.cookie_lifetime', 84600);

$controller = $_GET['controller'] ?? 'home';
$routes = require 'routes.php';

require_once $routes[$controller];