<?php
include "db.php";

$x = $_GET['order_id'];

mysqli_query($koneksi, "Delete from tb_detailpesanan where order_id='$x'");

header ("Location:tb_detail.php")
?>