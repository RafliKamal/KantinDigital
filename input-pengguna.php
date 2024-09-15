<?php
include "db.php";

$a = $_POST['userid'];
$b = $_POST['nama'];
$c = $_POST['password'];
$d = $_POST['role'];
$e = $_POST['email'];
$f = $_POST['nomor'];
$g = $_POST['status'];

mysqli_query($koneksi, "INSERT INTO tb_pengguna(`user_id`, `nama`, `password`, `role`, `email`, `no_hp`, `status`) VALUES ('$a','$b','$c','$d','$e','$f','$g')");

header("Location:tb_pengguna.php")
?>