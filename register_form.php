<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
if (!empty($_SESSION['user']['auth'])):?>
    <div>
        <p>Вы уже авторизованы, пройдите по ссылке ниже.</p>
        <a href="index.php">Тык</a>
    </div>
<?php else: ?>
    <form action="vendor/register.php" method="POST" enctype="multipart/form-data">

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
<?php endif; ?>