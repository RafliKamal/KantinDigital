<?php
include "db.php";
$x = $_GET['userid'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE user_id='$x'");

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
    <form action="proses-edit-pengguna.php" method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="userid" name="userid"  value="<?php echo $a['user_id'];?>">
                <label for="floatingInput">User ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nama" name="nama"  value="<?php echo $a['nama'];?>">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="password" name="password"  value="<?php echo $a['password'];?>">
                <label for="floatingInput">password</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="role">
                <option value="<?php echo $a['role'];?>"><?php echo $a['role'];?></option>
                <option value="Admin">Admin</option>
                <option value="Pelanggan">Pelanggan</option>
                </select>
                <label for="floatingSelect">Role</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="email" name="email"  value="<?php echo $a['email'];?>">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nomor" name="nomor"  value="<?php echo $a['no_hp'];?>">
                <label for="floatingInput">Nomor HP</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                    <option value="<?php echo $a['status'];?>"><?php echo $a['status'];?></option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
                <label for="floatingSelect">Status</label>
            </div>
            <br>
        <a href="tb_pengguna.php"><button type="button" class="btn btn-secondary">Close</button></a>
        <input type="submit" value="Simpan" name="simpan"  class="btn btn-success">
    </form>
<div class="text-center"></div>