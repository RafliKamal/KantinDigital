<?php
include "db.php";

$x = $_GET['kategori_id'];

mysqli_query($koneksi, "Delete from tb_kategori where kategori_id='$x'");

header ("Location:tb_kategori.php")
?>