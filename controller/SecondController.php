<?php
require_once 'model/User.php';
session_start();
$pageHeader = 'Вторая';

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    //setcookie('username', null, -1, '/');
    unset($_SESSION['username']);
    // unset($_COOKIE['username']);
}

$username = null;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
}

include "view/second.php";