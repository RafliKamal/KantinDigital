<?php
include "db.php";
$tampil = mysqli_query($koneksi, "Select * from tb_menu");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu</title>
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
        <h2 class="title">Data Menu Makanan dan Minuman</h2>

        <button type="button" class="btn btn-primary tambahdata" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="input-menu.php" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="menuid" name="menuid">
                        <label for="floatingInput">Menu ID</label>
                    </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="kategori">
                    <?php
                    while($b = mysqli_fetch_array($kategori))
                    {?>
                        <option value="<?php echo $b['nama_kategori']?>"><?php echo $b['nama_kategori']?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <label for="floatingSelect">Kategori</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="nama" name="namamenu">
                        <label for="floatingInput">Nama Menu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="deskripsi" name="deskripsi">
                        <label for="floatingInput">Deskripsi Menu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="stok" name="stok">
                        <label for="floatingInput">Stok</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="harga" name="harga">
                        <label for="floatingInput">Harga</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                        <label class="input-group-text" for="inputGroupFile02">Gambar Menu</label>
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
                    <td>Menu id</td>
                    <td>Kategori id</td>
                    <td>Nama Menu</td>
                    <td>Deskripsi Menu</td>
                    <td>Stok</td>
                    <td>Harga </td>
                    <td>Gambar</td>
                    <td>Action</td>
                    <?php
                    while($a = mysqli_fetch_array($tampil))
                    {?>
                        <tr>
                        <td><?php echo $a['menu_id']?></td>
                        <td><?php echo $a['kategori_id']?></td>
                        <td><?php echo $a['nama_menu']?></td>
                        <td><?php echo $a['deskripsi_menu']?></td>
                        <td><?php echo $a['stok']?></td>
                        <td><?php echo $a['harga']?></td>
                        <td><img src="<?php echo $a['gambar_menu']?>" width="50px" ></td>
                        <td>
                            <a href="hapus-menu.php?menu_id=<?php echo $a['menu_id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')">Delete</a>
                            <a href="edit-menu.php?menu_id=<?php echo $a['menu_id']; ?>" class="btn btn-warning" style="margin-left: 5px;  padding: 7px 24px;">Edit</a>
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