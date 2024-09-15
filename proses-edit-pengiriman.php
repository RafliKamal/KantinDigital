<?php
include "db.php";

$a = $_POST['pengirimanid'];
$b = $_POST['lokasi'];
$c = $_POST['ongkir'];

mysqli_query($koneksi, "UPDATE tb_pengiriman SET lokasi_pengiriman='$b', ongkos_kirim = '$c' WHERE pengiriman_id='$a'");

header("Location:tb_pengiriman.php")
?>