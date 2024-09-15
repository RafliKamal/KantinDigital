<?php
include "db.php";

$user_id = $_SESSION['user_id'];
$tampil = mysqli_query($koneksi, "Select * from keranjang where user_id = '$user_id' and order_id='1'");
$total = 0;
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
        <div class="tombolkategori">
            <ul>
                <?php
                while($b = mysqli_fetch_array($kategori))
                {?>
                    <li>
                    
                        <a href=""><?php echo $b['nama_kategori']?></a>
                    
                    </li> 
                <?php
                }
                ?>
            </ul>
        </div>
        <div>
            <form action="">
                <input type="text" name="cari" id="cari" placeholder="Cari Menu Kantin">
                <img src="gambar/carii.png" class="gmbrcari">
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

        <div class="keranjang2">
            <h2>Keranjang</h2>
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
                            <div class="jumlah">
                                <a href="tambah-jumlah.php?menu_id=<?php echo $a['menu_id']; ?>"><img src="gambar/plus.png" width="45px"></a>
                                <p><?php echo $a['jumlah']?></p>
                                <a href="kurang-jumlah.php?menu_id=<?php echo $a['menu_id']; ?>"><img src="gambar/min.png" width="45px"></a>
                            </div>
                        </div>

                    </div>
                <?php
                    $total = $total + ($a['jumlah'] * $a['harga']);
                    }
                ?>
            </div>
        </div>

        <div class="total">
            <h2>Total <small>Rp<?php echo $total ?></small></h2>
        </div>

        <form action="input-pesanan-keranjang.php" method="POST" enctype="multipart/form-data">
            <select name="lokasi" class="lokasi">
                <option selected>Lokasi Pemesanan</option>
                <?php
                    while($p = mysqli_fetch_array($pengiriman))
                {?>

                <option value="<?php echo $p['pengiriman_id']?>"><?php echo $p['lokasi_pengiriman']?></option>
       
                <?php
                }
                ?>
            </select>
            <br>
            <textarea id="deskripsi" name="deskripsi" rows="4" cols="50">Deskripsi Pesanan.</textarea> <br>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="submit" value="Checkout" name="Checkout" class="Checkout" >
           
            
        </form>

<script>
        let profile = document.querySelector('.profile');
        let tombolprofile = document.querySelector('.tombolprofile');
        profile.onclick = function(){
            tombolprofile.classList.toggle('active');
        }

        
    </script>
</body>
</html>