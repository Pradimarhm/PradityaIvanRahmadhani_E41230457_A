<?php
require('koneksi.php'); // Pastikan file koneksi disertakan

// Membuat instance dari class koneksi
$koneksiObj = new koneksi(); // Inisialisasi koneksi
$koneksi = $koneksiObj->koneksi; // Akses objek PDO

if ($koneksi) {
    $id = $_GET['id']; // Mendapatkan ID dari query string

    try {
        // Siapkan dan jalankan query DELETE menggunakan prepared statement untuk keamanan
        $query = $koneksi->prepare("DELETE FROM user_detail WHERE id=:id");
        $query->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter dengan jenis data integer
        $query->execute();

        // Redirect ke halaman home setelah berhasil menghapus
        header("Location: home.php");
        exit(); // Pastikan script berhenti setelah redirect
    } catch (PDOException $e) {
        // Tangkap dan tampilkan pesan error jika terjadi kesalahan
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Koneksi ke database gagal.";
}
?>
