<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');


require_once(__DIR__.'/sql_connection.php');





if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT `access_level` FROM Client WHERE login='$login' AND password='$password'";
    $result = mysqli_query($mysql, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        session_start();
        $_SESSION['flash'] = '<h2>Успешная авторизация!</h2>';
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['access_level'] = $user['access_level'];
        header('Location: index.php');
    } else {
       echo "Неверный ввод";
    }
}
?>
<form action="" method="POST">
	<input name="login" placeholder="Логин">
	<input name="password" type="password" placeholder="Пароль!!!!">
	<input type="submit">
</form>

<?php