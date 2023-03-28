<?php
require_once 'config/sql_connection.php';
session_start();

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}


echo "<h1>Добавление траспорта для пользователя</h1>";

if (!empty($_SESSION['user']['auth'])) : ?>

    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>

    <form action="vendor/save_add_user_car.php?id=<?= $_GET['id'] ?>" method="POST">
        Модель:<br> <input placeholder="String" name="model"><br><br>
        Бренд:<br> <input placeholder="String" name="brand"><br><br>
        Цвет:<br> <input placeholder="String" name="color"><br><br>
        <input value="Бахнуть" type="submit">
    </form>

<?php
else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>