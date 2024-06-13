<?php
require_once '../helper/connection.php';

$search = $connection->real_escape_string($_POST['query']);
$result = $connection->query("SELECT namaAset FROM dataaset WHERE namaAset LIKE '%$search%'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['namaAset'] . "<br>";
	}
}
