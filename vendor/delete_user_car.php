<?php
require_once '../config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

$id = $_GET['id'];
echo "<h1>Удаление авто</h1>";

if (!empty($_SESSION['user']['auth'])) :

$model = mysqli_query($mysql, "SELECT * FROM Cars WHERE id=$id") or die(mysqli_error($mysql));
$model = mysqli_fetch_assoc($model);


$delete = "DELETE FROM Cars WHERE id=$id";
mysqli_query($mysql, $delete) or die(mysqli_error($mysql));
$_SESSION['flash'] = "<h2>Машина удалена! </h2>";
header('Location: /clients.php');

else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>

