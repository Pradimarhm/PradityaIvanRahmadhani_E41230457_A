<?php
require('koneksi.php'); // Memastikan koneksi sudah disertakan
require('query.php');   // Memastikan CRUD class sudah disertakan

// Mengambil data dari URL dengan parameter 'user_fullname'
$email = isset($_GET['user_fullname']) ? $_GET['user_fullname'] : 'Pengguna'; // Jika tidak ada, tampilkan default

// Membuat instance dari class crud
$obj = new crud();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Memanggil Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selamat Datang, <?php echo htmlspecialchars($email); ?></h1>

        <!-- Tabel untuk menampilkan data -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
    </div>

    <!-- Memanggil Bootstrap JS dan Bundle dengan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
