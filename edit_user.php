<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (empty($_GET)) {
    header('Location: index.php');
    die();
}
require_once 'config/sql_connection.php';

$id = $_GET['id'];

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$query = "SELECT * FROM Client WHERE id='$id'";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));
$row = mysqli_fetch_assoc($result);

session_start();
if (!empty($_SESSION['user']['auth'])):?>
    <h1>Редактирование данных клиента "<?= $row['client_name'] ?>"</h1>
    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>
    <form action="vendor/save_edit_user.php?id=<?= $_GET['id'] ?>" method="POST">
        Имя клиента:<br> <input required placeholder="String" name="client_name" value="<?= $row['client_name'] ?>"><br>
        Скидка:<br> <input required name="sale" value="<?= $row['sale'] ?>"><br>
        Задолженность:<br> <input required name="debt" value="<?= $row['debt'] ?>"><br>
        Логин:<br> <input required name="login" value="<?= $row['login'] ?>"><br>
        Пароль:<br> <input required name="debt" value="<?= $row['password'] ?>"><br>
        Уровень доступа: <br><br>
        Обычный <input required name="access_level" type="radio" value="<?= $row['access_level'] ?>"><br>
        Суперпользователь <input required name="access_level" type="radio" value="<?= $row['access_level'] ?>"><br><br><br>

        <input value="Бахнуть" type="submit">
    </form>

<?php else: ?>
    <div>
        <p>Стоит бы авторизироваться, для начала!</p>
        <a href="login_form.php">Вот здесь!</a>
    </div>

<?php endif; ?>