<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');



?>
<h1>Добавление нового пользователя</h1>
<a href="index.php">
    <button>К списку</button>
</a><br><br>
<form action="save_add_user.php" method="POST">
    Имя клиента:<br> <input placeholder="String" name="client_name"><br><br>
    Марка авто:<br> <input placeholder="String" name="brand"><br><br>
    Время въезда:<br> <input placeholder="HH:MM:(SS)" name="time_arrive"><br><br>
    Дата въезда:<br> <input placeholder="YY-MM-DD" name="date_arrive"><br><br>
    Стоимость стоянки:<br> <input readonly value="2000" name="price"><br><br>
    Скидка:<br> <input value="0" name="sale"><br><br>
    Задолженность:<br> <input value="0" name="debt"><br><br><br>
    <input value="Бахнуть" type="submit">
</form>