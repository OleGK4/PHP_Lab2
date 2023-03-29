<?php
require_once'../config/sql_connection.php';


if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $client_name = $_POST['lastname'] .' '. $_POST['firstname'] .' '. $_POST['surname'];

    if ($_POST['access_level']){
        $access_level = 1;
        }
        else {
            $access_level = 0;
        }

    $query = "SELECT * FROM Client WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($mysql, $query));

    if (empty($user)){
        if ($_POST['password'] == $_POST['confirm']){
            $query = "INSERT INTO Client SET login = '$login',
                                             password = '$password',
                                             client_name = '$client_name', 
                                             access_level = '$access_level' ";
            $result = mysqli_query($mysql, $query);
            $query = "SELECT * FROM Client WHERE login='$login'";
            $result = mysqli_query($mysql, $query);
            $user = mysqli_fetch_assoc($result);
            session_start();

            $id = mysqli_insert_id($mysql);

            $_SESSION['flash'] = '<h2>Успешная регистрация!</h2>';

            $_SESSION['user'] = [
                'auth' => true,
                'login' => $login,
                'access_level' => $access_level,
                'debt' => $user['debt'],
                'sale' => $user['sale'],
                'id' => $user['id'],
            ];

            header('Location: /index.php');
        }   else {
            echo "Пароли не совпадают!";
        }

    } else {
        echo 'Логин занят!';
    }

} else {
    echo 'Ne robit';
}


