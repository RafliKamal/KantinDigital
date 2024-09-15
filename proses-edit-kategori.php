<?php
include "db.php";

$a = $_POST['kategori_id'];
$b = $_POST['namakategori'];

mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$b' WHERE kategori_id='$a'");

header("Location:tb_kategori.php")
?>