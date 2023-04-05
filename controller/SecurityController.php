<?php

session_start();

require_once 'model/UserProvider.php';

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
  ['username' => $username, 'password' => $password] = $_POST;

  $userProvider = new UserProvider();
  $user = $userProvider->getByUsernameAndPassword($username, $password);

  if ($user === null) {
    $error = "Были введены неверные данные";
  } else {
    $_SESSION['user'] = $user;
    header('Location: /');
    exit;
  }
}

if (isset($_SESSION['user'])) {
  header('Location: /');
  exit();
}

require_once 'view/signin.php';