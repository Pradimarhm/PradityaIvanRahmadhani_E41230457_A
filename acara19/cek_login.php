<?php
// Memulai session untuk menyimpan informasi pengguna
session_start();

// Menghubungkan file koneksi untuk terhubung ke database
include 'koneksi.php';

// Menangkap data dari form login yang dikirim dengan metode POST
$username = $_POST['username']; // Mengambil data username
$password = md5($_POST['password']); // Mengambil data password dan mengenkripsinya dengan MD5

// Query untuk menyeleksi data admin berdasarkan username dan password yang diinput
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND MD5('password123')");

// Menghitung jumlah baris yang ditemukan dengan username dan password yang cocok
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    // Jika ada data yang cocok, simpan username dalam session dan set status login
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // Redirect ke halaman admin
    header("location:admin/index.php");
} else {
    // Jika data tidak ditemukan, redirect kembali ke halaman login dengan pesan gagal
    header("location:login.php?pesan=gagal"); // Mengarahkan kembali ke file login.php jika gagal
}
?>
