<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
echo "<h1>Список стояночных мест</h1>";


$parking = "SELECT 
   Client.client_name,
   Cars.model,
   ParkingPlaces.date_arrive,
   ParkingPlaces.time_arrive,
   ParkingPlaces.price,
   ParkingPlaces.availability,
   ParkingPlaces.id
FROM `ParkingPlaces`
left join Client on Client.id=ParkingPlaces.client_id
left join Cars on Cars.id=ParkingPlaces.car_id
";
$result = mysqli_query($mysql, $parking) or die(mysqli_error($mysql));


if (!empty($_SESSION['user']['auth'])) :
    ?>
    <a href="index.php">
        <button> < К главному интерфейсу</button>
    </a><br><br>
    <?php echo "------------------------------" . "<br>";
    while ($parking = mysqli_fetch_assoc($result)) { ?>


        ID места: <?= $parking['id']; ?> <br>
        Модель машины: <?= $parking['model']; ?> <br>
        Имя клиента: <?= $parking['client_name']; ?> <br>
        Время прибытия на место: <?= $parking['time_arrive']; ?> <br>
        Дата прибытия на место: <?= $parking['date_arrive']; ?> <br>
        Цена аренды: <?= $parking['price']; ?> <br>
        Статус доступности места: <?php
        if ($parking['availability'] == 1 || $parking['availability']): { ?>
            Доступно<br>
            <?php
        } elseif ($parking['availability'] == null): { ?>
            Доступно<br>
            <?php
        } else: { ?>
            Недоуступно<br>
            <?php
        }
        endif;
        echo "-----------------------------" .  "<br>";
    }
    ?>
<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>



