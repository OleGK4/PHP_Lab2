<?php
if (!empty($_SESSION['user']['auth'])):?>
<div>
    <p>Вы уже авторизованы, пройдите по ссылке ниже.</p>
    <a href="index.php">Тык</a>
</div>
<?php else: ?>
<form action="vendor/register.php" method="POST" enctype="multipart/form-data">

	<input required name="login" placeholder="Логин"><br>
    <input required name="password" type="password" placeholder="Пароль"><br>
    <input required type="password" name="confirm" placeholder="Повторение пароля"><br>
    <input required name="lastname" placeholder="Фамилия"><br>
    <input required name="firstname" placeholder="Имя"><br>
    <input required name="surname" placeholder="Отчество"><br>
    <input type="checkbox" name="access_level" placeholder="Уровень допуска"><br>
	<input type="submit">
</form>
<?php endif; ?>