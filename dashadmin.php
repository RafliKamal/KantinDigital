<?php
include "db.php";
$tampil = mysqli_query($koneksi, "Select * from pesanan where order_id > 1 and status not like 'SELESAI'");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu</title>
    <link rel="stylesheet" href="dashadmiin.css">
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

        <div class="dash">
        <div class="menu">
            <?php
                while($a = mysqli_fetch_array($tampil))
            {?>
                <div class="kotak">
                    <div >
                        <img src="gambar/pesanan.jpg" width="290px" height="180px">
                    </div>
                    <div class="namamenu">
                        <h3><?php echo $a['nama']?></h3>
                    </div>
                    <div class="harga">
                        <div>
                        <p><small>Rp</small><?php echo $a['Total']?></p> 
                        </div>
                        <div>
                            <a href="detail_pesanan.php?order_id=<?php echo $a['order_id']; ?>"><img src="gambar/view.png" width="90px"></a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?>
            
        </div>
    </div>
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>