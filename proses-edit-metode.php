<?php
include "db.php";

$a = $_POST['metodeid'];
$b = $_POST['nama_metode'];

mysqli_query($koneksi, "UPDATE tb_metodebayar SET nama_metode='$b' WHERE metode_id='$a'");

header("Location:tb_metode.php")
?>