<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

$id = $_GET['id'];

$query = "SELECT `client_name` FROM Client WHERE id='$id'";
$result = mysqli_query($mysql, $query) or die (mysqli_error($mysql));
$user = mysqli_fetch_assoc($result);


if (!empty($_SESSION['user']['auth'])) : ?>
    <h1>Добавление транспорта для пользователя: "<?= $user['client_name'] ?>"</h1>
    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>

    <form action="vendor/save_add_user_car.php?id=<?= $_GET['id'] ?>" method="POST">
        Модель:<br> <input required placeholder="String" name="model"><br><br>
        Бренд:<br> <input required placeholder="String" name="brand"><br><br>
        Цвет:<br> <input required placeholder="String" name="color"><br><br>
        <input value="Бахнуть" type="submit">
    </form>

<?php
else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>