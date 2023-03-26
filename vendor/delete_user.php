<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once'../config/sql_connection.php';

if (empty($_GET)) {
    header('Location: /index.php');
    die();
}

$id = $_GET['id'];


if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}

$query = "DELETE FROM Client WHERE id=$id";
mysqli_query($mysql, $query) or die(mysqli_error($mysql));
?>
    <a href="../index.php">
        <button>К списку</button>
    </a><br><br>
<?php
echo "Пользователь с ид $id удален";
