<?php
include "db.php";
$x = $_GET['order_id'];

$data = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE order_id='$x'");
$pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE order_id='$x'");

$b = mysqli_fetch_array($pesanan);
$total = 0;

$role = $_SESSION['role'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>struk</title>
    <link rel="stylesheet" href="sruk.css">
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


    <div class="container">
        <h1>My Canteen</h1>
        <h3>No.<?php echo $b['order_id'].' - '.$b['tanggal'].' - '.$b['status'];?></h3>
        <h3>Lokasi Pemesanan : <?php echo $b['lokasi_pengiriman']; ?></h3>
        <hr>
        <div class="detail1">
            <p class="jumlah1">Jml</p>
            <p class="nama1">Item</p>
            <p class="harga1">Harga</p>
        </div>
        <hr>
        <?php
        while($a = mysqli_fetch_array($data))
        {
            ?>
            <div class="detail2">
                <P class="jumlah2"><?php echo $a['jumlah']; ?> </P>

                <P class="nama2"><?php echo $a['nama_menu']; ?> </P>             
                
                <P class="harga2"><small>Rp</small> <?php echo $a['harga']; ?> </P>

 
            </div>
            <?php
            $total = $total + ($a['harga'] * $a['jumlah']);
        }
        ?>
        <hr>
        <div class="total1">
            <p class="total2">Total</p>
            <p class="nominal"><small>Rp</small> <?php echo $total ?></p>

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