<?php
require_once(__DIR__.'/sql_connection.php');


error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (mysqli_connect_errno()) {
    echo "ОШЫБКА", mysqli_connect_error();
}
echo "YO";

$query = "select Client.client_name as client_name, Cars.brand as cars_brand
from `Client`
left join Cars on Client.id=Cars.client_id";
$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));


while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <p>
            <?= $row['Client'] ;?>
        </p>

    <?php
}