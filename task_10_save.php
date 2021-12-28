<?php

session_start();

$connect = mysqli_connect('localhost', 'user', 'pass', 'marlin_course');
if (!$connect) {
    die('Error connect to DataBase');
}

$text = $_POST['text'];

$check_text = mysqli_fetch_array(mysqli_query($connect, "SELECT `text` FROM `task_9` WHERE `text` = '$text' LIMIT 1"));
if ($check_text['text'] == $text) {
    $_SESSION['message_err'] = 'Такой текс уже есть!';
} else {
    $sql = "INSERT INTO `task_9` (`id`, `text`) VALUE (NULL, '$text')";
    mysqli_query($connect, $sql);
    $_SESSION['message'] = 'Текст успешно добавлен!';
}
mysqli_close($connect);
header('Location: task_10.php');