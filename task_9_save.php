<?php


$connect = mysqli_connect('localhost', 'user', 'pass', 'marlin_course');
if (!$connect) {
    die('Error connect to DataBase');
}

$text = $_POST['text'];

$sql = "INSERT INTO `task_9` (`id`, `text`) VALUE (NULL, '$text')";
mysqli_query($connect, $sql);

header('Location: task_9.html');