<?php
require_once(__DIR__.'/sql_connection.php');


error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
echo "YO" . "<br>";


$query = "select *
from `Client`
    left join Cars on Client.id=Cars.client_id";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <p>
        Name: <?= $row['client_name']; ?> <br>
        Brand: <?= $row['brand']; ?> <br>
        ID: <?= $row['id']; ?> <br>
        Model: <?= $row['model']; ?> <br>
        Car colour: <?= $row['color']; ?> <br>
    </p>

<?php
}




