<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysql = mysqli_connect("localhost", "root", "", "Parking_DB");

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$id = $_GET['id'];
$client_name = $_POST['client_name'];
$brand = $_POST['brand'];
$time_arrive = $_POST['time_arrive'];
$date_arrive = $_POST['date_arrive'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$debt = $_POST['debt'];


$query = "UPDATE Client SET
		client_name='$client_name',
		brand='$brand',
		time_arrive='$time_arrive',
		date_arrive='$date_arrive',
		price='$price',
		sale='$sale',
		debt='$debt' 
	WHERE id=$id";

mysqli_query($mysql, $query) or die(mysqli_error($mysql));
?>
<a href="index.php">
    <button>К списку</button>
</a><br><br>
<?php
echo 'Данные о клиенте успешно изменены!';
?>
