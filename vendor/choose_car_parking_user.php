<?php

require_once '../config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

if (!empty($_POST)) {
    $client_id = $_POST['client_id'];
}

echo "<h1>Выбор автомобилия для стоянки</h1>";?>

<a href="/add_parking_user.php?id=<?=$_GET;?>">
        <button> < К Выбору пользователя</button>
    </a><br><br>

<?php
$cars = mysqli_query($mysql, "SELECT * FROM Cars WHERE client_id='$client_id'") or die(mysqli_error($mysql));
$cars = mysqli_fetch_all($cars);


if (!empty($_SESSION['user']['auth'])) : ?>
    <h2>Выберите авто, которое нужно поставить, из списка ниже.</h2>
<form action="save_choose_car_parking_user.php?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
    <?php
    if (!empty($cars)):{
        foreach ($cars as $car) {
            $check_parking = mysqli_query($mysql, "SELECT `car_id` FROM ParkingPlaces WHERE car_id='$car[0]'") or die(mysqli_error($mysql));
            $check_parking = mysqli_fetch_assoc($check_parking);
            if (empty($check_parking)){
                if ($client_id == $car[4]) {
                    ?>
                    Модель авто: <br> <input type="text" disabled name="car_model" value="<?= $car[2] ?>">
                    <input required type="radio" name="car_id" value="<?= $car[0] ?>"><br>
                    <?php
                }
            } if (!empty($check_parking) and $car[0] == $check_parking['car_id']) {
                ?>
                Занятая тачка! <br> <input type="text" disabled name="car_model" value="<?= $car[2] ?>"><br>
                <?php
            }
        }
    } else: { ?>
        <p>У него нет авто</p><br>
        <a href="/add_user_car.php?id=<?= $_POST['client_id'] ?>">Добавить авто
        </a><br>
        <?php
    }
    endif;
    ?>
    <?php if (!empty($cars)) { ?>
        <input type="hidden" name="client_id" value="<?= $client_id ?>"><br>
        Время прибытия на место: <br> <input required type="time" name="time_arrive"><br>
        Дата прибытия на место: <br> <input required type="date" name="date_arrive"><br>
        <button type="submit">Отправить</button>
</form>
       <?php
    } ?>


<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>
