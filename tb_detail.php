<?php
include "db.php";
$tampil = mysqli_query($koneksi, "Select * from tb_detailpesanan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Detail Pesanan</title>
    <link rel="stylesheet" href="tb_pengguna.css">
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
        <h2 class="title">Data Detail Pesanan</h2>
            <br>
            <br>
            <br>       
            <table class="table table-striped text-center">
                <tr class="fw-semibold">
                    <td>Order id</td>
                    <td>User id</td>
                    <td>Menu id</td>
                    <td>Jumlah</td>
                    <td>Action</td>
                    <?php
                    while($a = mysqli_fetch_array($tampil))
                    {?>
                        <tr>
                        <td><?php echo $a['order_id']?></td>
                        <td><?php echo $a['user_id']?></td>
                        <td><?php echo $a['menu_id']?></td>
                        <td><?php echo $a['jumlah']?></td>
                        <td>
                            <a href="hapus-detailpesanan.php?order_id=<?php echo $a['order_id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')">Delete</a>
                            <a href="edit-detailpesanan.php?order_id=<?php echo $a['order_id']; ?>" class="btn btn-warning" style="margin-left: 5px;  padding: 7px 24px;">Edit</a>
                        </td>
                        </tr>
                <?php
                    }
                    ?>
                </tr>
            </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>