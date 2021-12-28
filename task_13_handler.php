<?php
session_start();

$_SESSION['count_click_button'] += 1;

header('Location: task_13.php');