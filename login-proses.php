<?php

include "db.php";

$a = $_POST['email'];
$b = $_POST['password'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where email = '$a' AND password = '$b' AND status='Aktif'");
$x = mysqli_fetch_array($hasil);
$ketemu = mysqli_num_rows($hasil);

if ($ketemu == 1){
    $_SESSION['email'] = $a;
    $_SESSION['nama'] = $x['nama'];
    $_SESSION['role'] = $x['role'];
    $_SESSION['user_id'] = $x['user_id'];
    
    header ('location:dashboard.php');
    
}
else{
    echo "Anda Tidak Berhak Mengakses Web Ini!";
    echo "<a href='login.php'> Kembali </a>";
}

?>  