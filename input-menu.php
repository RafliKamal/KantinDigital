<?php
include "db.php";

$nama_foto = $_FILES['gambar']['name'];

$nama_foto_tmp = $_FILES['gambar']['tmp_name'];

$pindahkan_foto = move_uploaded_file($nama_foto_tmp, "gambar/".$nama_foto);

if($pindahkan_foto)
{
    $path_foto = "gambar/".$nama_foto;
}
else
{
    echo "Upload Foto Gagal!";
}
$temp = $_POST['kategori'];
$z = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE nama_kategori='$temp'");
$wow = mysqli_fetch_array($z);

$a = $_POST['menuid'];
$b = $wow['kategori_id'];
$c = $_POST['namamenu'];
$d = $_POST['deskripsi'];
$e = $_POST['stok'];
$f = $_POST['harga'];


mysqli_query($koneksi, "insert into tb_menu(menu_id, kategori_id, nama_menu, deskripsi_menu, stok, harga, gambar_menu) values ('$a','$b','$c','$d','$e','$f', '$path_foto')");

header("Location:tb_menu.php")
?>