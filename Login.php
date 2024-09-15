<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="login">
        <div class="logo tengah"></div>
        <h2 class="putih">Sign in to your account</h2>
        <br>
        <form action="login-proses.php" method="POST" >
          <div class="form-floating mb-4 mt-3 form tengah">
            <input type="text" class="form-control" id="floatingInput" placeholder="Masukan Email" name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-5 form tengah">
            <input type="password" class="form-control" id="floatingInput" placeholder="Masukan Password" name="password">
            <label for="floatingInput">Password</label>
          </div>
        <input type="submit" value="Continue" name="login"  class="tombol rounded-4">
      </form>

      <p>Dont have an account? <a href="signup.php" class="a">Create Now</a></p>
    </div>

</body>
</html>