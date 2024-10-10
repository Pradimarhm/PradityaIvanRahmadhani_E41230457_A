<?php
// Menghubungkan ke database MySQL
$koneksi = mysqli_connect("localhost", "root", "", "akademik");

// Memeriksa apakah koneksi ke database gagal
if (mysqli_connect_errno()) {
    // Menampilkan pesan error jika koneksi gagal
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>