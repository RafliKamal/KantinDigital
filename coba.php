<?php
include "db.php";

$tampil = mysqli_query($koneksi, "Select * from tb_menu");
$tampila = mysqli_query($koneksi, "Select * from tb_menu order by stok desc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="coba.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
        </div>
        <div class="mycanteen"></div>
        <div>
            <form action="">
                <select name="kategori" id="kategori">
                    <option value="">Pilih Kategori</option>
                    <?php
                    while($b = mysqli_fetch_array($kategori))
                    {?>
                        <option value="<?php echo $b['nama_kategori']?>"><?php echo $b['nama_kategori']?></option>
                    <?php
                    }
                    ?>
                </select>
            </form>
        </div>
        <div>
            <form action="">
                <input type="text" name="cari" id="cari" placeholder="Cari Menu Kantin">
                <img src="gambar/carii.png" class="gmbrcari">
            </form>
        </div>
        <div class="keranjang">

        </div>
        <div class="notif">

        </div>
        <div class="profile">
             <img src="gambar/kepala.png" class="kepala"> 
        </div>
        <div class="tombolprofile">
            <ul>
                <li>
                    <a href="">Profile</a>
                </li>
                <li>
                    <a href="">Menu Admin</a>
                </li>
                <li>
                    <a href="">Sign</a>
                </li>
            </ul>
        </div>
        
    </nav>

    <script>
        let profile = document.querySelector('.profile');
        let tombolprofile = document.querySelector('.tombolprofile');
        profile.onclick = function(){
            tombolprofile.classList.toggle('active');
        }
    </script>
</body>
</html>