<?php

session_start();

$connect = mysqli_connect('localhost', 'user', 'pass', 'marlin_db');
if (!$connect) {
    die('Error connect to DataBase');
}

$email = $_POST['email'];
$pass = $_POST['password'];
$hash_pass = password_hash($pass, PASSWORD_BCRYPT);

$check_email = mysqli_fetch_array(mysqli_query($connect, "SELECT `email` FROM `users` WHERE `email` = '$email' LIMIT 1"));
if ($check_email['email'] == $email) {
    $_SESSION['message_err'] = 'Этот email уже занят другим пользователем!';
} else {
    $sql = "INSERT INTO `users` (`id`, `email`, `pass`) VALUE (NULL, '$email', '$hash_pass')";
    mysqli_query($connect, $sql);
    $_SESSION['message'] = 'Пользователь успешно добавлен!';
}
mysqli_close($connect);
header('Location: task_11.php');