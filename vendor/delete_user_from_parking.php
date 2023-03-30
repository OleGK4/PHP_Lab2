<?php
require_once '../config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

if (!empty($_GET)) {
   $id = $_GET['id'];
}

echo "<h1>Удаление из стоянки</h1>";

if (!empty($_SESSION['user']['auth'])) :
$parking = "UPDATE ParkingPlaces SET
    time_arrive = NULL, 
    date_arrive = NULL, 
    client_id = NULL, 
    car_id = 0, 
    availability = NULL
WHERE id=$id";
mysqli_query($mysql, $parking);

$_SESSION['flash'] = "<h2>Стоянка очищена! </h2>";
header('Location: /parking_places.php');

else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>
