<?php
include "db.php";

$a = $_POST['userid'];
$b = $_POST['nama'];
$c = $_POST['password'];
$d = $_POST['role'];
$e = $_POST['email'];
$f = $_POST['nomor'];
$g = $_POST['status'];

mysqli_query($koneksi, "UPDATE tb_pengguna SET nama='$b', password='$c', role='$d', email='$e', no_hp='$f', status='$g' WHERE user_id='$a'");

header("Location:tb_pengguna.php")
?>