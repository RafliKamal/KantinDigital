<?php
include "db.php";

$x = $_GET['order_id'];

mysqli_query($koneksi, "UPDATE tb_pesanan SET status = 'SELESAI' where order_id='$x'");
mysqli_query($koneksi, "UPDATE tb_pembayaran SET status_pembayaran = 'LUNAS' where pembayaran_id='$x'");


header ("Location:detail_pesanan.php?order_id=$x")
?>