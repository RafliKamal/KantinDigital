<?php
include "db.php";

$a = $order_id;
$b = $_SESSION['user_id'];
$c = $_POST['lokasi'];
$d = $_POST['total'];
$e = $_POST['deskripsi'];


mysqli_query($koneksi, "INSERT INTO tb_pesanan VALUES ('$a','$b','$c','2024-01-17T16:23','$d','$e','PENDING')");
mysqli_query($koneksi, "UPDATE tb_pesanan SET deskripsi ='$e.' WHERE order_id='$a'");
mysqli_query($koneksi, "UPDATE tb_detailpesanan SET order_id ='$a' WHERE order_id='1' AND user_id='$b'");
mysqli_query($koneksi, "INSERT INTO tb_pembayaran VALUES ('$a','$a','Met01','','PENDING')");


header("Location:buat_struk.php?order_id=$a")
?>