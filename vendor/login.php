<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');


require_once'../config/sql_connection.php';





if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT `access_level`, `login`, `sale`, `id`, `debt` FROM Client WHERE login='$login' AND password='$password'";
    $result = mysqli_query($mysql, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        session_start();
        $_SESSION['flash'] = '<h2>Успешная авторизация!</h2>';

        $_SESSION['user'] = [
            'auth' => true,
            'login' => $user['login'],
            'access_level' => $user['access_level'],
            'debt' => $user['debt'],
            'sale' => $user['sale'],
            'id' => $user['id'],
        ];

        header('Location: /index.php');
    } else {
        echo "Неверный ввод";
    }
}