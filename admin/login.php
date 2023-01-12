<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
  <?php include "header.php" ?>
  <title>Login | Jepara Furniture Comumunity</title>
</head>

<body>
  <div class="row text-center">
    <div class="col s12 m4 offset-m4 center">
      <img src="../assets/img/homepage/logo atas.png">
    </div>
  </div>
  <div class="row">
    <div class="col s12 m4 offset-m4">
      <div class="resposive-card card  hoverable" style="border-radius:50px;">
        <div class="card-action blue darken-4 white-text">
          <h3 align="center">Login Admin</h3>
        </div>
        <form method="post">
          <div class="card-content">
            <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <label>Username</label>
              <input type="text" name="user">
            </div><br>
            <div class="input-field">
              <i class="material-icons prefix">vpn_key</i>
              <label>Password</label>
              <input type="password" name="pass">
            </div>
            <button class="btn blue darken-4 right " name="login" style="border-radius:50px ;">Login</button>
            <br>
          </div>

        </form>

        <?php
        if (isset($_POST['login'])) {
          $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' 
            AND password='$_POST[pass]' ");
          $yangcocok = $ambil->num_rows;
          if ($yangcocok == 1) {
            $_SESSION['admin'] = $ambil->fetch_assoc();
            echo "<script>alert('Login Sukses') </script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'> ";
          } else {
            echo "<script>alert('Login Sukses') </script>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'> ";
          }
        }

        ?>
      </div>
    </div>
  </div>

</body>









<script>

</script>
</body>

</html>