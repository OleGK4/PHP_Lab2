<?php
echo "<h1>Главный интерфейс</h1>";
session_start();

if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
if (!empty($_SESSION['user']['auth'])):?>
    <div>
        <a href="clients.php">
            <button>Клиенты</button>
        </a><br><br>
        <a href="parking_places.php">
            <button>Стояночные места</button>
        </a><br>
    </div>

    <div>
        <?php if(isset($_SESSION['user']['login']) or (isset($_SESSION['user']['access_level']))):{ ?>
                <p>
                    Пользователь: <strong><?= $_SESSION['user']['login']; ?></strong><br>
                    <?php if($_SESSION['user']['access_level'] == 0):{?>
                        Уровень доступа пользователя: <strong>Обычный</strong>
                        <?php
                    }
                    else: {?>
                        Уровень доступа пользователя: <strong>Суперпользователь</strong>
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

    <?php else: ?>
    <div>
        <a href="login_form.php">Авторизация</a><br>
        <a href="register_form.php">Регистрация</a>
    </div>
<?php endif ?>

