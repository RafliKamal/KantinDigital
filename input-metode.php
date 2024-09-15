<?php
include "db.php";

$a = $_POST['metodeid'];
$b = $_POST['nama_metode'];


mysqli_query($koneksi, "INSERT INTO tb_metodebayar(`metode_id`, `nama_metode`) VALUES ('$a','$b')");

header("Location:tb_metode.php")
?>