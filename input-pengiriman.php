<?php
include "db.php";

$a = $_POST['pengirimanid'];
$b = $_POST['lokasi'];
$c = $_POST['ongkir'];


mysqli_query($koneksi, "INSERT INTO tb_pengiriman(`pengiriman_id`, `lokasi_pengiriman`, `ongkos_kirim`) VALUES ('$a','$b','$c')");

header("Location:tb_pengiriman.php")
?>

