<?php
include "db.php";

$a = $_POST['nim'];
$b = $_POST['nama'];
$c = $_POST['alamat'];
$d = $_POST['email'];

if(file_exists($_FILES['name']['tmp_name']) || is_uploaded_file($_FILES['gambar']['tmp_name']))
{
    $nama_foto = $_FILES['gambar']['name'];

    $nama_foto_tmp = $_FILES['gambar']['tmp_name'];

    $pindahkan_foto = move_uploaded_file($nama_foto_tmp, "gambar/".$nama_foto);

    if($pindahkan_foto)
    {
        $path_foto = "gambar/".$nama_foto;
    }

}

else{
    $path_foto = $_POST['gambar1'];
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


mysqli_query($koneksi, "UPDATE `tb_menu` SET `kategori_id`='$b',`nama_menu`='$c',`deskripsi_menu`='$d',`stok`='$e',`harga`='$f',`gambar_menu`='$path_foto' WHERE `menu_id`='$a'");

header("Location:tb_menu.php")
?>