<?php
require('koneksi.php'); // Memastikan koneksi sudah disertakan
require('query.php');   // Memastikan CRUD class sudah disertakan

session_start(); // Mulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Mengambil data dari sesi
$email = $_SESSION['user_email'];
$user_fullname = $_SESSION['user_fullname'] ?? 'Pengguna';

// Membuat instance dari class crud
$obj = new crud();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Selamat Datang, <?php echo htmlspecialchars($user_fullname); ?></h1>
                    </div>
                    <div class="card-body">
                        <!-- Mulai tabel untuk menampilkan data -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                // Mengambil data dari database menggunakan method lihatData() dari class crud
                                $data = $obj->lihatData();
                                $no = 1;

                                // Mengecek apakah ada data yang diambil dari database
                                if ($data->rowCount() > 0) {
                                    // Looping untuk menampilkan setiap baris data
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['user_fullname']); ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="hapus.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data ditemukan</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="logout.php" class="btn btn-secondary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
