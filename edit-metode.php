<?php
include "db.php";

$x = $_GET['metode_id'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_metodebayar WHERE metode_id='$x'");

$a = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Metode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container-sm mt-5">
    <form action="proses-edit-metode.php" method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="metodeid" name="metodeid"  value="<?php echo $a['metode_id'];?>">
            <label for="floatingInput">Metode ID</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="nama" name="nama_metode"  value="<?php echo $a['nama_metode'];?>">
            <label for="floatingInput">Nama Metode</label>
        </div>
   
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="Simpan" name="simpan"  class="btn btn-success">
    </form>
</div>
</body>
</html>

