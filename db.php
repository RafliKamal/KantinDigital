<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'projekweb2');
$kategori = mysqli_query($koneksi, "Select * from tb_kategori");
$pesanan = mysqli_query($koneksi, "Select * from tb_pesanan");
while($a = mysqli_fetch_array($pesanan))
    {
        $order_id = $a['order_id']+1;
    }


$metode = mysqli_query($koneksi, "Select * from tb_metodebayar");
$pengiriman = mysqli_query($koneksi, "Select * from tb_pengiriman");
$user = mysqli_query($koneksi, "Select * from tb_pengguna");
$user_id = mysqli_num_rows($user);



$order = mysqli_query($koneksi, "Select * from tb_pesanan");


session_start();
?>