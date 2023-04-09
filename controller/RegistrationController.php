<?php

$pdo = require 'db.php';
require_once 'model/UserProvider.php';

session_start();

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $user = new User($username);
    $user->setName($username);
    $userProvider = new UserProvider($pdo);
    $result = $userProvider->registerUser($user, $password);
    if ($result === false) {
        $error = 'Не удалось зарегистрироваться!';
    } else {
        $_SESSION['user'] = $userProvider->getByUsernameAndPassword($username, $password);
        header("Location: index.php");
        die();
    }
}
require_once 'view/registration.php';
