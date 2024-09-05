<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $umur = isset($_POST['umur']) ? $_POST['umur'] : 0;

    // Proses data (misalnya, validasi, simpan ke database, dll.)
    // Di sini kita hanya akan menampilkan kembali data yang diterima
    echo "<h1>Data yang Diterima</h1>";
    echo "<p>Nama: " . htmlspecialchars($nama) . "</p>";
    echo "<p>Umur: " . htmlspecialchars($umur) . "</p>";
} else {
    echo "Metode tidak valid!";
}
?>
