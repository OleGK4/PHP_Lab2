<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

if (!empty($_SESSION['user']['auth'])):?>

    <h1>Добавление нового пользователя</h1>
<?php
    if (isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
    ?>
    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>
    <form action="vendor/save_add_user.php" method="POST">

        Логин: <br> <input required name="login"><br>
        Пароль: <br> <input required name="password" type="password"><br>
        Повторение пароля: <br> <input required type="password" name="confirm"><br>
        Фамилия: <br> <input required name="lastname"><br>
        Имя: <br> <input required name="firstname"><br>
        Отчество: <br> <input required name="surname"><br>
        Уровень доступа: <br><br>
        Обычный<input required name="access_level" type="radio" value="0"><br>
        Суперпользователь<input required name="access_level" type="radio" value="1"><br><br><br>

        <input type="submit">
    </form>

<?php else: ?>
    <div>
        <p>Стоит бы авторизироваться, для начала!</p>
        <a href="login_form.php">Вот здесь!</a>
    </div>

<?php endif; ?>