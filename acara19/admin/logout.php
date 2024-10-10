<?php
// Memulai session
session_start();

// Menghapus semua session untuk logout
session_destroy();

// Redirect ke halaman login dengan pesan logout
header("location:../login.php?pesan=logout"); // Mengarahkan ke login.php setelah logout
?>