<?php
require_once '../config/sql_connection.php';
session_start();
if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

$id = $_GET['id'];

if (!empty($_POST)) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $client_id = $_GET['id'];
}


if (!empty($_SESSION['user']['auth'])):
    $addition = "INSERT INTO Cars SET
                     brand = '$brand',
                     model ='$model',
                     color = '$color',
                     client_id = '$client_id'";

mysqli_query($mysql, $addition) or die(mysqli_error($mysql));
$_SESSION['flash'] = "<h2>Машина модели '$model' добавлена! </h2>";
header('Location: /clients.php');

?>
<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>
