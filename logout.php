<?php
// Memulai session
session_start();

// Menghapus semua session
session_unset();

// Menghancurkan session
session_destroy();

// Arahkan pengguna kembali ke halaman login
header("Location: http://localhost/kasmasjid1/login.php");
exit();
?>
