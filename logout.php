<?php
session_start();
$_SESSION['user']['auth'] = null;
$_SESSION['flash'] = '<h2>Вы вышли из аккаунта!</h2>';
header('Location: index.php');