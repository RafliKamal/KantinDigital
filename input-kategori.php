<?php
include "db.php";

$a = $_POST['kategori_id'];
$b = $_POST['namakategori'];


mysqli_query($koneksi, "INSERT INTO tb_kategori(`kategori_id`, `nama_kategori`) VALUES ('$a','$b')");

header("Location:tb_kategori.php")
?>