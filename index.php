<?php
require_once(__DIR__.'/sql_connection.php');

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$query = "select * from `Client`";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));

echo "<h1>Клиенты автостоянки</h1>";
?>
    <a href="add_user.php">
        <button>Добавить нового клиента</button>
    </a><br>
<?php
echo "-----------------------------";


while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <p>
        Имя клиента: <?= $row['client_name']; ?> <br>
        Марка авто: <?= $row['brand']; ?> <br>
        Время въезда: <?= $row['time_arrive']; ?> <br>
        Дата въезда: <?= $row['date_arrive']; ?> <br>
        Стоимость стоянки: <?= $row['price']; ?> <br>
        Скидка: <?= $row['sale']; ?> <br>
        Задолженность: <?= $row['debt']; ?> <br>
    </p>

    <a href="edit.php?id=<?= $row['id'] ?>">
        <button>Редактировать</button>
    </a><br><br>
    <a href="handler.php?id=<?= $row['id'] ?>">
        <button>Удалить</button>
    </a><br><br>
    <a href="test.php?id=<?= $row['id'] ?>">
        <button>ТЕСТ</button>
    </a><br>

    <?php
    echo "-----------------------------";
}
// CREATE, READ, UPDATE, DELETE
