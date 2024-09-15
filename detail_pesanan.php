<?php
include "db.php";

$x = $_GET['order_id'];
$data = mysqli_query($koneksi, "Select * from keranjang where order_id = '$x'");
$cek = mysqli_query($koneksi, "Select * from pesanan where order_id = '$x'");
$z = mysqli_fetch_array($cek)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu</title>
    <link rel="stylesheet" href="detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="side">
        <a href="dashboard.php"><div class="logo"></div></a>
        <p id="user"><?php echo $_SESSION['nama']." - ".$_SESSION['role']?> </p>
        <p><a href="dashadmin.php">Dashboard Admin</a></p>
        <p><a href="tb_pengguna.php">Data Pengguna</a></p>
        <p><a href="tb_kategori.php">Data Kategori</a></p>
        <p><a href="tb_menu.php">Data Menu Makanan</a></p>
        <p><a href="tb_metode.php">Data Metode Pembayaran</a></p>
        <p><a href="tb_pembayaran.php">Data Pembayaran</a></p>
        <p><a href="tb_pesanan.php">Data Pesanan</a></p>
        <p><a href="tb_detail.php">Data Detail Pesanan</a></p>
        <p><a href="tb_pengiriman.php">Data Pengiriman</a></p>
        <div>
                <p class="signout"><a href="signout.php">Sign Out</a></p>  
        </div>
        
    </div>
    <div class="inti">
        <h2 class="title">Dashboard Admin</h2> <hr>
            <div class="rekomendasi">
                <div class="flex">
                <h2>Orderan Pelanggan</h2>
                <p>Lokasi Pemesanan : <?php echo $z['lokasi_pengiriman'] ?></p>
                <?php 
                if($z['status']=='PENDING')
                {
                    ?>

                    <a href="proses-pesanan.php?order_id=<?php echo $x?>" class="btn btn-success form" >Proses Pesanan</a>
                    <?php
                }
                elseif($z['status']=='DIPROSES')
                {
                    ?>
                    <a href="selesai-pesanan.php?order_id=<?php echo $x?>" class="btn btn-warning form" >Pesanan Selesai</a>
                    <?php
                }
                ?>
                
            </div>
             <br>
            <div class="menu">
                <?php
                    while($a = mysqli_fetch_array($data))
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
                                <p><?php echo $a['jumlah']?> Porsi</p>
                            </div>
                        </div>

                    </div>
                <?php
                    }
                ?>
            </div>
            
            <br>
            <h2>Deskripsi Pesanan</h2>
            <p><?php echo $z['deskripsi'] ?></p>
        </div>

    
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>