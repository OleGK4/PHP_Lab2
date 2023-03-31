<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
require_once '../config/sql_connection.php';

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$id = $_GET['id'];
$client_name = $_POST['client_name'];
$sale = $_POST['sale'];
$debt = $_POST['debt'];
$login = $_POST['login'];
$password = $_POST['password'];
if ($_POST['access_level']) {
    $access_level = 1;
} else {
    $access_level = 0;
}


$query = "UPDATE Client SET
		`client_name`='$client_name',
		`sale`='$sale',
		`debt`='$debt',
		`login`='$login', 
		`password`='$password', 
		`access_level`='$access_level' 
	WHERE `id`=$id";

mysqli_query($mysql, $query) or die(mysqli_error($mysql));

$_SESSION['flash'] = '<h2>Успешное редактирование пользователя!</h2>';
header('Location: /clients.php');


