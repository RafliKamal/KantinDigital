<?php
include "db.php";

$x = $_GET['menu_id'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE menu_id='$x'");

$a = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
<div class="container-sm mt-5">
<form action="proses-edit-menu.php" method="POST" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="menuid" name="menuid" value="<?php echo $a['menu_id'];?>">
        <label for="floatingInput">Menu ID</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="kategori" >
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
        <input type="text" class="form-control" id="floatingInput" placeholder="nama" name="namamenu" value="<?php echo $a['nama_menu'];?>">
        <label for="floatingInput">Nama Menu</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="deskripsi" name="deskripsi" value="<?php echo $a['deskripsi_menu'];?>">
        <label for="floatingInput">Deskripsi Menu</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="stok" name="stok" value="<?php echo $a['stok'];?>">
        <label for="floatingInput">Stok</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="harga" name="harga" value="<?php echo $a['harga'];?>">
        <label for="floatingInput">Harga</label>
    </div>
    <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
        <label class="input-group-text" for="inputGroupFile02">Gambar Menu</label>
    </div>
    <input type="hidden" name="gambar1" value="<?php echo $a['gambar_menu'];?>">
    <a href="tb_menu.php"><button type="button" class="btn btn-secondary" >Close</button></a>
    <input type="submit" value="Simpan" name="simpan"  class="btn btn-success">
</div>

</form>

