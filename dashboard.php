<?php
include "db.php";

$tampil = mysqli_query($koneksi, "Select * from tb_menu");
$tampila = mysqli_query($koneksi, "Select * from tb_menu order by stok desc");
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dasboardza.css">
</head>
<body>
    <nav class="navbar">
            <a href="dashboard.php"><div class="logo"></div></a>
        <a href="dashboard.php"><div class="mycanteen"></div></a>

            <div id="kategori"></div>
            

        <div>
            <form method="POST">
                <input type="text" name="cari" id="cari" placeholder="Cari Menu Kantin">
                <img src="gambar/carii.png" class="gmbrcari">
                <!-- <button type="hidden" name="submit" class="btncari" >Cari</button> -->
            </form>
        </div>
        <a href="keranjang.php" class="keranjang"></a>
        <a href="cek_status.php" class="notif"></a>
        <div class="profile">
             <img src="gambar/kepala.png" class="kepala"> 
        </div>
        <div class="tombolprofile list">
            <ul class="list">
                    <div>
                        <img src="gambar/kepala.png"> <p id="user"> <?php echo $_SESSION['nama']." - ".$_SESSION['role']?> </p>
                    </div>
                    
                <li>
                
                <?php
                if($role== 'Admin')
                {
                ?>
                <div>
                    <img src="gambar/admin.png" > <p> <a href="tb_pengguna.php">Menu Admin</a></p>
                </div>
                <?php
                }
                else{

                }
                ?>
                    
                </li>
                <li>
                <div>
                <img src="gambar/logout2.png" class="signout"> <p> <a href="signout.php">Sign Out</a></p>
                </div>
                </li>
            </ul>
        </div>
        
    </nav>

    
    <?php
    if(isset($_POST['cari'])){

        $search = $_POST['cari'];
        $cari = mysqli_query($koneksi, "Select * from tb_menu where nama_menu LIKE '%$search%'");
    ?>
        <div class="rekomendasi">
        <h2>Pencarian</h2>
        <div class="menu">
            <?php
                while($c = mysqli_fetch_array($cari))
            {?>
                <div class="kotak">
                    <div >
                        <img src="<?php echo $c['gambar_menu']?>" width="290px" height="180px">
                    </div>
                    <div class="namamenu">
                        <h3><?php echo $c['nama_menu']?></h3>
                    </div>
                    <div class="harga">
                        <div>
                        <p><small>Rp</small><?php echo $c['harga']?></p> 
                        </div>
                        <div>
                            <a href="tambah-keranjang.php?menu_id=<?php echo $c['menu_id']; ?>"><img src="gambar/tambah_ke_Keranjang.png" width="90px"></a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?>
            
        </div>
    </div>


    <?php
    }
    ?>
    <div class="rekomendasi">
        <h2>Menu Rekomendasi</h2>
        <div class="menu">
            <?php
                while($a = mysqli_fetch_array($tampil))
            {?>
                <div class="kotak">
                    <div >
                        <img src="<?php echo $a['gambar_menu']?>" width="290px" height="180px">
                    </div>
                    <div class="namamenu">
                        <h3><?php echo $a['nama_menu']?></h3>
                    </div>
                    <div class="harga">
                        <div>
                        <p><small>Rp</small><?php echo $a['harga']?></p> 
                        </div>
                        <div>
                            <a href="tambah-keranjang.php?menu_id=<?php echo $a['menu_id']; ?>"><img src="gambar/tambah_ke_Keranjang.png" width="90px"></a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?>
            
        </div>
    </div>

    <div class="laris">
        <h2>Paling Laris</h2>
        <div class="menu">
            <?php
                while($b = mysqli_fetch_array($tampila))
            {?>
                <div class="kotak">
                    <div >
                        <img src="<?php echo $b['gambar_menu']?>" width="290px" height="180px">
                    </div>
                    <div class="namamenu">
                        <h3><?php echo $b['nama_menu']?></h3>
                    </div>
                    <div class="harga">
                        <div>
                        <p><small>Rp</small><?php echo $b['harga']?></p> 
                        </div>
                        <div>
                            <a  href="tambah-keranjang.php?menu_id=<?php echo $b['menu_id']; ?>"><img src="gambar/tambah_ke_Keranjang.png" width="90px"></a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?>
        </div>
    </div>
    


    <script>
        let profile = document.querySelector('.profile');
        let tombolprofile = document.querySelector('.tombolprofile');
        profile.onclick = function(){
            tombolprofile.classList.toggle('active');
        }

       
    </script>
</body>
</html>