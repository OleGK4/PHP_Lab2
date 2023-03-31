<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}


echo "<h1>Выбор пользователя для парковочного места</h1>";



$clients = "SELECT * FROM Client";
$result = mysqli_query($mysql, $clients) or die(mysqli_error($mysql));?>

<a href="parking_places.php">
    <button> < К списку стояночных мест</button>
</a><br><br>

<form action="vendor/choose_car_parking_user.php?id=<?= $_GET['id'] ?>" method="post">

<?php
if (!empty($_SESSION['user']['auth'])) :
    while ($clients = mysqli_fetch_assoc($result)) {
        ?>
            Имя пользователя: <br> <input type="text" disabled name="client_name" value="<?= $clients['client_name'] ?>">
            <input type="radio" required name="client_id" value="<?= $clients['id'] ?>"><br>
        <?php
    }
    ?>
    <button type="submit">Отправить</button>
</form>

<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>
