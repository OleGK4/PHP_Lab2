<?php
require_once(__DIR__.'/sql_connection.php');



if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$query = "select * from `Client`";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));

echo "<h1>Клиенты автостоянки</h1>";
session_start();

if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
if (!empty($_SESSION['auth'])):?>
    <div>
        <a href="add_user.php">
            <button>Добавить нового клиента</button>
        </a><br><br>
        <?php if(isset($_SESSION['login']) or (isset($_SESSION['access_level']))):{ ?>
                <p>
                    Пользователь: <strong><?= $_SESSION['login']; ?></strong><br>
                    <?php if($_SESSION['access_level'] == 0):{?>
                        Уровень допуска пользователя: <strong>Обычный</strong>
                        <?php
                    }
                    else: {?>
                        Уровень допуска пользователя: <strong>Суперпользователь</strong>
                        <?php
                    }
                    endif;?>
                </p><br>
        <?php  }
        endif; ?>


        <a href="logout.php">
            <button>Выйти</button>
        </a><br>
    </div>
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
    <?php if($_SESSION['access_level'] != 0){?>

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
    }
    echo "-----------------------------";
}
?>

    <?php else: ?>
    <div>
        <a href="login.php">Авторизация</a><br>
        <a href="register.php">Регистрация</a>
    </div>
<?php endif ?>

