<?php

$pdo = require 'controller/db.php';
require_once 'model/UserProvider.php';

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$user = new User('vadim');
$user->setName('vadim');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');


$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  description  VARCHAR(250),
  isDone  tinyint,
  user_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
)');
