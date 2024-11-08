<?php
session_start();
require_once '../Controller/nilaiController.php';
require_once '../config/database.php'; // Pastikan Anda memiliki file ini untuk koneksi ke database

if (!isset($_SESSION['email']) && !isset($_COOKIE['user_logged_in'])) {
    header("Location: ../Views/index.php");
    exit();
} else {
    if (!isset($_SESSION['email']) && isset($_COOKIE['email'])) {
        $_SESSION['email'] = $_COOKIE['email'];
        $_SESSION['level'] = $_COOKIE['level'];
    }
}

$level = $_SESSION['level'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "Pengguna";

// Ambil nama berdasarkan email dari database
$nama = "Pengguna"; // Set default jika tidak ditemukan

if ($email !== "Pengguna") {
    // Membuat koneksi ke database
    $db = new database();
    $conn = $db->getConnection();
    
    if ($conn) {
        // Query menggunakan PDO untuk mengambil nama berdasarkan email
        $stmt = $conn->prepare("SELECT nama FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Mengecek apakah ada hasil
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $nama = $row['nama'];
        }
    } else {
        // Tangani error jika koneksi database gagal
        echo "Koneksi ke database gagal.";
    }
}


$nilaiController = new NilaiController();
$nilaiList = $nilaiController->getAllNilai();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body {
            width: 100%;
            height: 100vh;
            min-height: 100%;
        }
        .root-container {
            height: 100%;
            width: 100%;
        }
        .navbar {
            width: 100%;
            height: 40px;
            background-color: #e9ecef;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <div class="container-fluid root-container m-0 p-0 w-100 h-100 d-flex flex-column row-gap-3">
        <nav class="navbar p-2 d-flex align-items-center" style="height: 4rem;">
            <span class="me-auto">Selamat datang, <?php echo htmlspecialchars($nama); ?></span>
            <form action="../Controller/logoutController.php" method="post" class="d-inline">
                <button type="submit" name="logout" class="btn btn-danger ms-3">Logout</button>
            </form>
        </nav>

        <div class="content-container p-0 m-3">
            <?php
            if ($level == '1') {
                echo "<a href='Product/addView.php' class='bg-primary' style='color: white; border-radius: 5px; padding: 4px; text-decoration: none;'>Tambah Nilai</a>";
            }
            ?>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Mata Kuliah</th>
                        <th>Nilai</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Grade</th>
                        <?php if ($level == '1') { ?>
                            <th colspan="2">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (!empty($nilaiList)) {
                        foreach ($nilaiList as $nilai) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($nilai['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['nid_nim']) . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['nama_mahasiswa']) . "</td>";
                            echo "<td>" . (isset($nilai['mata_kuliah']) ? htmlspecialchars($nilai['mata_kuliah']) : 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['nilai']) . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['semester']) . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['tahun_ajaran']) . "</td>";
                            echo "<td>" . htmlspecialchars($nilai['grade']) . "</td>";
                            if ($level == '1') {
                                echo "<td>
                                    <a href='Product/updateView.php?action=update&id=" . htmlspecialchars($nilai['id']) . "'>
                                        <button class='btn btn-warning'>Edit</button>
                                    </a>
                                  </td>";
                                echo "<td>
                                    <a href='../Controller/nilaiController.php?action=delete&id=" . htmlspecialchars($nilai['id']) . "'>
                                        <button class='btn btn-danger'>Hapus</button>
                                  </a>
                                  </td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='8'>Data Kosong</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
