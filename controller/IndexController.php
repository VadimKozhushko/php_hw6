<?php
require_once 'model/User.php';
session_start();

$pageHeader = 'Добро пожаловать';


if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    //setcookie('username', null, -1, '/');
    unset($_SESSION['username']);
    session_destroy();
    // unset($_COOKIE['username']);
}

$username = null;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
}

include "view/index.php";