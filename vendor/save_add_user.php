<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once '../config/sql_connection.php';

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
if (!empty($_POST)) {
    $client_name = $_POST['client_name'];
    $brand = $_POST['brand'];
    $time_arrive = $_POST['time_arrive'];
    $date_arrive = $_POST['date_arrive'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $debt = $_POST['debt'];
}

$query = "INSERT INTO Client SET
        client_name='$client_name',
		brand='$brand',
		time_arrive='$time_arrive',
		date_arrive='$date_arrive',
		price='$price',
		sale='$sale',
		debt='$debt'";

mysqli_query($mysql, $query) or die(mysqli_error($mysql));
?>
    <a href="../index.php">
        <button>К списку</button>
    </a><br><br>
<?php
echo 'Новый клиент успешно добавлен!';
?>