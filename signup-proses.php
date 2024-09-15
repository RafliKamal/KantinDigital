<?php

include "db.php";

$a = $_POST['name'];
$b = $_POST['email'];
$c = $_POST['password'];

mysqli_query($koneksi, "Insert into tb_pengguna values ('P0$user_id','$a','$c','Pelanggan','$b','08123','Nonaktif')");



    header ('location:login.php');
    


?>  