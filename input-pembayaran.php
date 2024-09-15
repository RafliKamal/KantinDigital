<?php
include "db.php";

$a = $_POST['pembayaranid'];
$b = $_POST['order_id'];
$c = $_POST['metode'];
$d = $_POST['status_pembayaran'];



mysqli_query($koneksi, "insert into tb_pembayaran values ('$a','$b','$c','$path_foto','$d' )");

header("Location:tb_pembayaran.php")
?>