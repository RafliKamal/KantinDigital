<?php
include "db.php";

$x = $_GET['order_id'];

mysqli_query($koneksi, "UPDATE tb_pesanan SET status = 'DIPROSES' where order_id='$x'");

header ("Location:detail_pesanan.php?order_id=$x")
?>