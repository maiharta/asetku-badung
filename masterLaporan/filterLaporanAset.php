<?php
require_once '../helper/connection.php';

$query = "SELECT * FROM `dataaset`";

if (isset($_POST['filter'])) {
    $tipeAset = $_POST['tipeAset'];

    if ($tipeAset == 'elektronik') {
        $query .= " WHERE `tipeAset` LIKE '%(elektronik)'";
    } else if ($tipeAset == 'Kendaraan') {
        $query .= " WHERE `tipeAset` LIKE '%(kendaraan)'";
    }
} else if (isset($_POST['reset'])) {
    
}

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

if (mysqli_num_rows($result) > 0) {
    while ($fetch = mysqli_fetch_array($result)) {
        $originalDate = $fetch['tanggalPembelian'];
        $Pembelian = date("d-m-Y", strtotime($originalDate));
        echo "<tr><td>" . $fetch['opsiAset'] . "</td>
        <td>" . $fetch['noRegister'] . "</td>
        <td>" . $fetch['kodeBarang'] . "</td>
        <td>" . $fetch['namaAset'] . "</td>
        <td>" . $fetch['totalBarang'] . "</td>
        <td>" . $fetch['lokasiAset'] . "</td>
        <td>" . $fetch['tipeAset'] . "</td>
        <td>" . $fetch['supplier'] . "</td>
        <td>" . $fetch['harga'] . "</td>
        <td>" . $Pembelian . "</td>
        <td>" . $fetch['garansi'] . "</td>
        <td>" . $fetch['deskripsi'] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='12'>No data found.</td></tr>";
}
?>
