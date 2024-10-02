<?php
require('koneksi.php'); // Pastikan koneksi.php disertakan
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit;
}

// Membuat instance dari class koneksi
$koneksiObj = new koneksi(); // Inisialisasi koneksi
$koneksi = $koneksiObj->koneksi; // Akses objek PDO

if ($koneksi) {
    $id = $_GET['id']; // Mendapatkan ID dari query string

    try {
        // Siapkan dan jalankan query DELETE menggunakan prepared statement
        $query = $koneksi->prepare("DELETE FROM user_detail WHERE id=:id");
        $query->bindParam(':id', $id);
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Hapus Data</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-danger">Data telah berhasil dihapus.</p>
                        <div class="d-grid">
                            <a href="home.php" class="btn btn-primary">Kembali ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
