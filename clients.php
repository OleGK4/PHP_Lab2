<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
echo "<h1>Список клиентов</h1>";

if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$clients = "SELECT * FROM `Client`";
$result = mysqli_query($mysql, $clients) or die(mysqli_error($mysql));

$cars = mysqli_query($mysql, "SELECT * FROM Cars") or die(mysqli_error($mysql));
$cars = mysqli_fetch_all($cars);




if (!empty($_SESSION['user']['auth'])) :
    ?>
    <a href="index.php">
        <button> < К главному интерфейсу</button>
    </a><br><br>

    <a href="add_user.php">
        <button>Добавить нового клиента + </button>
    </a><br><br>

    <?php echo "------------------------------" .  "<br>";

    while ($clients = mysqli_fetch_assoc($result)) {


        ?>

        <p>
            <a href="edit_user.php?id=<?= $clients['id'] ?>">
                <button>Редактировать</button></a><br>
            <a href="vendor/delete_user.php?id=<?= $clients['id'] ?>">
                <button>Удалить клиента</button></a><br>
            Имя клиента: <?= $clients['client_name']; ?> <br>
            ID: <?= $clients['id']; ?> <br>
            Скидка: <?= $clients['sale']; ?> <br>
            Задолженность: <?= $clients['debt']; ?> <br>
            Логин: <?= $clients['login']; ?> <br>
            Уровень допуска: <?= $clients['access_level']; ?> <br>
            <ul>Транспорт:</ul>
            <?php
            if (!empty($clients['id'])){
                foreach ($cars as $car){
                    if ($clients['id'] == $car[4]){
                        ?>
                        <li><strong>Модель: "<?= $car[2]; ?>"</strong>
                            <a href="vendor/delete_user_car.php?id=<?= $car[0] ?>">
                                <button>Удалить авто</button></a><br></li><br>
                        <li>Бренд: "<?= $car[1]; ?>"</li><br>
                        <li>Цвет: "<?= $car[3]; ?>"</li><br>
                        <?php
                    }
                }
            }
            ?>
            <a href="add_user_car.php?id=<?= $clients['id'] ?>">
                <button>Добавить авто</button></a><br>
        </p>
        <?php if ($_SESSION['user']['access_level'] != 0) { ?>

            <a href="edit_user.php?id=<?= $clients['id'] ?>">
                <button>Редактировать</button>
            </a><br><br>
            <a href="vendor/delete_user.php?id=<?= $clients['id'] ?>">
                <button>Удалить</button>
            </a><br><br>
            <a href="test.php?id=<?= $clients['id'] ?>">
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
