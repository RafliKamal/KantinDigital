<?php
include "db.php";

$x = $_GET['menu_id'];

mysqli_query($koneksi, "Delete from tb_menu where menu_id='$x'");

header ("Location:tb_menu.php")
?>