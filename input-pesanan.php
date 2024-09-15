<?php
include "db.php";

$a = $_POST['orderid'];
$b = $_POST['userid'];
$c = $_POST['pengiriman'];
$d = $_POST['date'];
$e = $_POST['total'];
$f = $_POST['deskripsi'];

mysqli_query($koneksi, "INSERT INTO tb_pesanan VALUES ('$a','$b','$c','$d','$e','$f','PENDING')");

header("Location:tb_pesanan.php")
?>