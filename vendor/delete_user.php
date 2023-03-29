<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once'../config/sql_connection.php';

if (empty($_GET)) {
    header('Location: /index.php');
    die();
}

$id = $_GET['id'];


if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

$clients = "DELETE FROM Client WHERE id=$id";
$cars = "DELETE FROM Cars WHERE client_id=$id";
// Добавить удаление из таблицы со стоянками по left join через id

mysqli_query($mysql, $clients) or die(mysqli_error($mysql));
mysqli_query($mysql, $cars) or die(mysqli_error($mysql));

$_SESSION['flash'] = "<h2>Пользователь и пренадлежащий ему транспорт удалён!</h2>";
header('Location: /clients.php');


