<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (empty($_GET)) {
    header('Location: index.php');
    die();
};


$id = $_GET['id'];


$mysql = mysqli_connect("localhost", "root", "", "Parking_DB");

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
$query = "SELECT * FROM Client WHERE id=$id";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));
$row = mysqli_fetch_assoc($result);
?>
    <h1>Редактирование данных клиента "<?= $row['client_name'] ?>"</h1>
    <a href="index.php">
        <button>К списку</button>
    </a><br><br>
    <form action="save_edit.php?id=<?= $_GET['id'] ?>" method="POST">
        Имя клиента:<br> <input placeholder="String" name="client_name" value="<?= $row['client_name'] ?>"><br><br>
        Марка авто:<br> <input placeholder="String" name="brand" value="<?= $row['brand'] ?>"><br><br>
        Время въезда:<br> <input placeholder="HH:MM:(SS)" name="time_arrive" value="<?= $row['time_arrive'] ?>"><br><br>
        Дата въезда:<br> <input placeholder="YY-MM-DD" name="date_arrive" value="<?= $row['date_arrive'] ?>"><br><br>
        Стоимость стоянки:<br> <input readonly name="price" value="<?= $row['price'] ?>"><br><br>
        Скидка:<br> <input name="sale" value="<?= $row['sale'] ?>"><br><br>
        Задолженность:<br> <input name="debt" value="<?= $row['debt'] ?>"><br><br><br>
        <input value="Бахнуть" type="submit">
    </form>

<?php
