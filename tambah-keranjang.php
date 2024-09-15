<?php
include "db.php";

$x = $_GET['menu_id'];
$user_id = $_SESSION['user_id'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tb_detailpesanan where order_id = '1' AND menu_id = '$x' AND user_id = '$user_id'");
$ketemu = mysqli_num_rows($hasil);
$a = mysqli_fetch_array($hasil);

if ($ketemu == 1){
    $b = $a['jumlah'] + 1;
    mysqli_query($koneksi, "UPDATE tb_detailpesanan SET jumlah='$b' where menu_id = '$x'");
}
else{
    mysqli_query($koneksi, "INSERT INTO tb_detailpesanan(`order_id`, `user_id`, `menu_id`, `jumlah`) VALUES ('1','$user_id','$x','1')");
}

header("Location:keranjang.php")
?>