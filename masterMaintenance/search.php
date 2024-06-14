<?php

require_once '../helper/connection.php';

//$search = $connection->real_escape_string($_POST['query']);
//$result = $connection->query("SELECT namaAset FROM dataaset WHERE namaAset LIKE '%$search%'");
//if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        echo '<div class="suggestion">' . $row['namaAset'] . '</div>';
//    }
//}

$search = $connection->real_escape_string($_POST['query']);
$result = $connection->query("SELECT namaAset FROM dataaset WHERE namaAset LIKE '%$search%'");

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row['namaAset']);
    }
}

echo json_encode($data);
?>

