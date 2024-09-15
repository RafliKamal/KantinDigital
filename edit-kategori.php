<?php
include "db.php";
$x = $_GET['kategori_id'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE kategori_id='$x'");

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
<div class="form-floating mb-3">
<form action="proses-edit-kategori.php" method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="userid" name="kategori_id" value="<?php echo $a['kategori_id'];?>">
            <label for="floatingInput">Kategori ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="nama" name="namakategori" value="<?php echo $a['nama_kategori'];?>">
            <label for="floatingInput">Nama Kategori</label>
        </div>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <input type="submit" value="Simpan" name="simpan"  class="btn btn-success">
</form>
