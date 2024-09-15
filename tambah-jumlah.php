<?php
include "db.php";

$x = $_GET['menu_id'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tb_detailpesanan where menu_id = '$x'");

$a = mysqli_fetch_array($hasil);
$b = $a['jumlah'] + 1;

    mysqli_query($koneksi, "UPDATE tb_detailpesanan SET jumlah='$b' WHERE menu_id = '$x'");



header("Location:keranjang.php")
?>