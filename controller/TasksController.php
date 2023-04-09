<?php

$pdo = require 'db.php';
include_once "model/Task.php";
include_once "model/TaskProvider.php";
include_once "model/User.php";

session_start();

$pageHeader = "Задачи";

$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    header("Location: /");
    die();
}
$taskProvider = new TaskProvider($pdo);
$user = $_SESSION['user'];
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $task = new Task();
    $task->setDescription($taskText);
    $taskProvider->addTask($task, $user);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key, $user);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->doneTask($key, $user);
    header("Location: /?controller=tasks");
    die();
}

$tasks = $taskProvider->getUndoneList($user);
include "view/tasks.php";
