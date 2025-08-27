<?php
include "inc/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Kas Masjid Nur-Hidayah</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/login.css">

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <!-- KIRI -->
    <div class="left">
      <img src="dist/img/logo-uin.png" alt="Logo UIN" class="logo" />
      <div class="left-content">
        <div class="text-wrapper">
          <h1 class="title">ASSALAMU’ALAIKUM</h1>
          <p class="subtitle">Selamat datang di website Kas Masjid Nur-Hidayah</p>
        </div>
      </div>
    </div>

    <!-- KANAN -->
    <div class="right">
      <div class="form-wrapper">
        <h2>Selamat Datang!</h2>
        <p>Silahkan login untuk menggunakan website</p>
        <form action="" method="post">
          <input type="text" id="username" name="username" placeholder="Username" required />
          <input type="password" id="password" name="password" placeholder="Password" required />
          <button type="submit" name="btnLogin">LOGIN</button>
          <div class="message" id="messageBox"></div>
        </form>
      </div>
    </div>
  </div>

<?php
if (isset($_POST['btnLogin'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username'";
    $query_login = mysqli_query($koneksi, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login == 1) {

        if (password_verify($password, $data_login['password'])) {

            $_SESSION["ses_id"]       = $data_login["id_pengguna"];
            $_SESSION["ses_nama"]     = $data_login["nama_pengguna"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_level"]    = $data_login["level"];

            echo "<script>
            Swal.fire({
              title: 'Login Berhasil',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'index.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
              title: 'Login Gagal',
              text: 'Username atau Password salah!',
              icon: 'error',
              confirmButtonText: 'Coba Lagi'
            }).then(() => {
              window.location = 'login.php';
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
          title: 'Login Gagal',
          text: 'Username atau Password salah!',
          icon: 'error',
          confirmButtonText: 'Coba Lagi'
        }).then(() => {
          window.location = 'login.php';
        });
        </script>";
    }
}
?>

</body>
</html>
