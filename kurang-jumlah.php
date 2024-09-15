<?php
include "db.php";

$x = $_GET['menu_id'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tb_detailpesanan where menu_id = '$x'");

$a = mysqli_fetch_array($hasil);
$b = $a['jumlah'] - 1;

if($b>0)
{
    mysqli_query($koneksi, "UPDATE tb_detailpesanan SET jumlah='$b' WHERE menu_id = '$x'");
}
else{
    mysqli_query($koneksi, "DELETE from tb_detailpesanan WHERE menu_id = '$x'");
}



header("Location:keranjang.php")
?>