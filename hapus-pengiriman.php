<?php
include "db.php";

$x = $_GET['pengirimanid'];

mysqli_query($koneksi, "Delete from tb_pengiriman where pengiriman_id='$x'");

header ("Location:tb_pengiriman.php")
?>