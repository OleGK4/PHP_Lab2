<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
if (!empty($_SESSION['user']['auth'])):?>

<h1>Добавление нового пользователя</h1>
    <a href="clients.php">
        <button> < К списку клиентов</button>
    </a><br><br>
<form action="vendor/save_add_user.php" method="POST">
    Имя клиента:<br> <input placeholder="String" name="client_name"><br><br>
    Марка авто:<br> <input placeholder="String" name="brand"><br><br>
    Время въезда:<br> <input placeholder="HH:MM:(SS)" name="time_arrive"><br><br>
    Дата въезда:<br> <input placeholder="YY-MM-DD" name="date_arrive"><br><br>
    Стоимость стоянки:<br> <input readonly value="2000" name="price"><br><br>
    Скидка:<br> <input value="0" name="sale"><br><br>
    Задолженность:<br> <input value="0" name="debt"><br><br><br>
    <input value="Бахнуть" type="submit">
</form>

<?php else: ?>
    <div>
        <p>Стоит бы авторизироваться, для начала!</p>
        <a href="login_form.php">Вот здесь!</a>
    </div>

<?php endif; ?>