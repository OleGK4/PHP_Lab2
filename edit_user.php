<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (empty($_GET)) {
    header('Location: index.php');
    die();
}


$id = $_GET['id'];

require_once 'config/sql_connection.php';

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$query = "SELECT * FROM Client WHERE id=$id";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));
$row = mysqli_fetch_assoc($result);

session_start();
if (!empty($_SESSION['user']['auth'])):?>
    <h1>Редактирование данных клиента "<?= $row['client_name'] ?>"</h1>
    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>
    <form action="vendor/save_edit_user.php?id=<?= $_GET['id'] ?>" method="POST">
        Имя клиента:<br> <input placeholder="String" name="client_name" value="<?= $row['client_name'] ?>"><br><br>
        Марка авто:<br> <input placeholder="String" name="brand" value="<?= $row['brand'] ?>"><br><br>
        Время въезда:<br> <input placeholder="HH:MM:(SS)" name="time_arrive" value="<?= $row['time_arrive'] ?>"><br><br>
        Дата въезда:<br> <input placeholder="YY-MM-DD" name="date_arrive" value="<?= $row['date_arrive'] ?>"><br><br>
        Стоимость стоянки:<br> <input readonly name="price" value="<?= $row['price'] ?>"><br><br>
        Скидка:<br> <input name="sale" value="<?= $row['sale'] ?>"><br><br>
        Задолженность:<br> <input name="debt" value="<?= $row['debt'] ?>"><br><br><br>
        <input value="Бахнуть" type="submit">
    </form>

<?php else: ?>
    <div>
        <p>Стоит бы авторизироваться, для начала!</p>
        <a href="login_form.php">Вот здесь!</a>
    </div>

<?php endif; ?>