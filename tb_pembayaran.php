<?php
include "db.php";
$tampil = mysqli_query($koneksi, "Select * from tb_pembayaran");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran</title>
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
        <h2 class="title">Data Pembayaran</h2>

        <button type="button" class="btn btn-primary tambahdata" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="input-pembayaran.php" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="menuid" name="pembayaranid">
                        <label for="floatingInput">Pembayaran ID</label>
                    </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="order_id">
                    <?php
                    while($b = mysqli_fetch_array($pesanan))
                    {?>
                        <option value="<?php echo $b['order_id']?>"><?php echo $b['order_id']?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <label for="floatingSelect">Order Id</label>
                    </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="metode">
                    <?php
                    while($b = mysqli_fetch_array($metode))
                    {?>
                        <option value="<?php echo $b['metode_id']?>"><?php echo $b['nama_metode']?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <label for="floatingSelect">Metode Id</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                        <label class="input-group-text" for="inputGroupFile02">Bukti Pembayaran</label>
                    </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="status_pembayaran">
                        <option value="Lunas">Lunas</option>
                        <option value="Pending">Pending</option>                
                    </select>
                    <label for="floatingSelect">Status Pembayaran</label>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Simpan" name="simpan"  class="btn btn-success">
                </form>
            </div>
            </div>
        </div>
        </div>
            <table class="table table-striped text-center">
                <tr class="fw-semibold">
                    <td>ID Pembayaran</td>
                    <td>Order ID</td>
                    <td>Metode ID</td>
                    <td>Bukti Pembayaran</td>
                    <td>Status Pembayaran</td>
                    <td>Action</td>
                    <?php
                    while($a = mysqli_fetch_array($tampil))
                    {?>
                        <tr>
                        <td><?php echo $a['pembayaran_id']?></td>
                        <td><?php echo $a['order_id']?></td>
                        <td><?php echo $a['metode_id']?></td>
                        <td><img src="<?php echo $a['bukti_pembayaran']?>" width="50px" ></td>
                        <td><?php echo $a['status_pembayaran']?></td>
                        <td>
                            <a href="hapus-menu.php?pembayaran_id=<?php echo $a['pembayaran_id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')">Delete</a>
                            <a href="edit-menu.php?pembayaran_id=<?php echo $a['pembayaran_id']; ?>" class="btn btn-warning" style="margin-left: 5px;  padding: 7px 24px;">Edit</a>
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