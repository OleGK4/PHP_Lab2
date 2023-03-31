<?php
require_once '../config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

echo "<h1>Присвоение данных в БД</h1>";
$id = $_GET['id'];
echo $_GET['id'];
if (!empty($_SESSION['user']['auth'])) : ?>

    <?php
    if (!empty($_POST)) {
        $date_arrive = $_POST['date_arrive'];
        $time_arrive = $_POST['time_arrive'];
        $client_id = $_POST['client_id'];
        $car_id = $_POST['car_id'];
    }

    $add_user = "UPDATE ParkingPlaces SET
    time_arrive = '$time_arrive',
    date_arrive = '$date_arrive',
    client_id = '$client_id',
    car_id = '$car_id',
    availability = '0'
    WHERE id='$id'
    ";

    mysqli_query($mysql, $add_user) or die(mysqli_error($mysql));
    $_SESSION['flash'] = "<h2>Пользователь добавлен! </h2>";
    header('Location: /parking_places.php');

    ?>


<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>
