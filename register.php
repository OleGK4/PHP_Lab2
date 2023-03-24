<?php
require_once(__DIR__.'/sql_connection.php');


if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $client_name = $_POST['lastname'] .' '. $_POST['firstname'] .' '. $_POST['surname'];

    if (!$_POST['access_level']){
        $access_level = 0;
        }
        else {
            $access_level = 1;
        }

    $query = "SELECT * FROM Client WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($mysql, $query));

    if (empty($user)){
        if ($_POST['password'] == $_POST['confirm']){
            $query = "INSERT INTO Client SET login = '$login',
                                         password = '$password',
                                         client_name = '$client_name', 
                                         access_level = '$access_level' ";
            mysqli_query($mysql, $query);
            session_start();

            $_SESSION['auth'] = true;
            header('Location: index.php');

            $id = mysqli_insert_id($mysql);
            $_SESSION['id'] = $id;
            $_SESSION['access_level'] = $access_level;


        }   else {
            echo "Пароли не совпадают!";
        }

    } else {
        echo 'Логин занят!';
    }

}
?>

<form action="" method="POST">
	<input name="login" placeholder="Логин">
    <input name="password" type="password" placeholder="Пароль">
    <input type="password" name="confirm" placeholder="Повторение пароля">
    <input name="lastname" placeholder="Фамилия">
    <input name="firstname" placeholder="Имя">
    <input name="surname" placeholder="Отчество">
    <input type="checkbox" name="access_level" placeholder="Уровень допуска">
	<input type="submit">
</form>