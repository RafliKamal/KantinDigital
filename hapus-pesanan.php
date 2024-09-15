<?php
include "db.php";

$x = $_GET['order_id'];

mysqli_query($koneksi, "Delete from tb_pesanan where order_id='$x'");

header ("Location:tb_pesanan.php")
?>