<?php
include "db.php";

$x = $_GET['userid'];

mysqli_query($koneksi, "Delete from tb_pengguna where user_id='$x'");

header ("Location:tb_pengguna.php")
?>