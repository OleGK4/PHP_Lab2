<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
require_once '../config/sql_connection.php';

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $client_name = $_POST['lastname'] . ' ' . $_POST['firstname'] . ' ' . $_POST['surname'];

    if ($_POST['access_level']) {
        $access_level = 1;
    } else {
        $access_level = 0;
    }

    $query = "SELECT * FROM Client WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($mysql, $query));

    if (empty($user)) {
        if ($_POST['password'] == $_POST['confirm']) {
            $query = "INSERT INTO Client SET login = '$login',
                                             password = '$password',
                                             client_name = '$client_name', 
                                             access_level = '$access_level' ";
            $result = mysqli_query($mysql, $query);


            $_SESSION['flash'] = '<h2>Успешная регистрация пользователя!</h2>';
            header('Location: /clients.php');
        } else {
            echo "Пароли не совпадают!";
        }

    } else {
        echo 'Логин занят!';
    }

} else {
    echo 'Не робит!';
}


