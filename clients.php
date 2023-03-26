<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
echo "<h1>Список клиентов</h1>";

$query = "select *
from `Client`
    left join Cars on Client.id=Cars.client_id";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));


if (!empty($_SESSION['user']['auth'])) :
    ?>
    <a href="index.php">
        <button> < К главному интерфейсу</button>
    </a><br><br>

    <a href="add_user.php">
        <button>Добавить нового клиента + </button>
    </a><br><br>

    <?php echo "------------------------------" .  "<br>";

    $client = array();

    while ($row = mysqli_fetch_assoc($result)) {

        // Проверяем, есть ли уже массив для текущего клиента в $client
        if (!isset($client[$row['id']])) {
            $client[$row['id']] = array(
                'name' => $row['client_name'],
                'cars' => array()
            );
        }


        $car = array(
            'brand' => $row['brand'],
            'model' => $row['model'],
            'color' => $row['color']
        );
        $client[$row['id']]['cars'][] = $car;


//        foreach ($client as $i){        // ХЗ ВАЩЕ, вроде пытаюсь выводить имя, а выходит нецелесообразное мясо
//            echo($i['name'] . " ");
//
//            foreach ($i['cars'] as $j){
//                echo($j['brand'] . " ");
//                echo($j['model'] . " ");
//                echo($j['color'] . " |||| " . "<br>");
//            }
//
//        }

        ?>

        <p>
        Имя клиента: <?= $row['client_name']; ?> <br>
        Скидка: <?= $row['sale']; ?> <br>
        Задолженность: <?= $row['debt']; ?> <br>
        Логин: <?= $row['login']; ?> <br>
        Уровень допуска: <?= $row['access_level']; ?> <br>
        Транспорт:<br>
            Бренд: "<?= $row['brand']; ?>",
            Модель: "<?= $row['model']; ?>",
            Цвет: "<?= $row['color']; ?>"<br>

    </p>
    <?php if ($_SESSION['user']['access_level'] != 0) { ?>

        <a href="edit.php?id=<?= $row['id'] ?>">
            <button>Редактировать</button>
        </a><br><br>
        <a href="vendor/delete_user.php?id=<?= $row['id'] ?>">
            <button>Удалить</button>
        </a><br><br>
        <a href="test.php?id=<?= $row['id'] ?>">
            <button>ТЕСТ</button>
        </a><br>
        <?php
    }
    echo "-----------------------------" .  "<br>";
} ?>


<?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>