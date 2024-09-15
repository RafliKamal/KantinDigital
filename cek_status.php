<?php
include "db.php";

$user_id = $_SESSION['user_id'];
$data = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE user_id='$user_id'");
$pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE user_id='$user_id' and order_id > 1");

$role = $_SESSION['role'];

?>


    

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="keranjang1.css">
</head>
<body>
    <nav class="navbar">
        <a href="dashboard.php"><div class="logo"></div></a>
        <a href="dashboard.php"><div class="mycanteen"></div></a>

        <div id="kategori">
        </div>
        
        <div>
            <form action="">
                <input type="text" name="cari" id="cari" placeholder="Cari Menu Kantin">
                <img src="gambar/carii.png" class="gmbrcari">
            </form>
        </div>
        <a href="keranjang.php" class="keranjang"></a>
        <a href="" class="notif"></a>
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

        <div class="keranjang2">
            <h2>Riwayat Pemesanan</h2>
            <div class="menu">
                <?php
                    while($a = mysqli_fetch_array($pesanan))
                {?>
                    <div class="kotak">
                        <div >
                            <img src="gambar/history.png" width="200px" height="180px">
                        </div>
                        <div class="namamenu">
                            <h3>Order No.<?php echo $a['order_id']?></h3>
                        </div>
                        <div class="harga">
                            <div>
                            <p><small>Rp</small><?php echo $a['Total']?></p> 
                            </div>
                            <div class="cek">
                                <a href="buat_struk.php?order_id=<?php echo $a['order_id']; ?>"><img src="gambar/view.png" width="80px"></a>
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