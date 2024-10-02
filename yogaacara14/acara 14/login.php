<?php
require('koneksi.php');

class Login {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi = $db;
    }

    public function authenticate($email, $pass) {
        if (!empty(trim($email)) && !empty(trim($pass))) {
            try {
                // Query untuk mengambil data pengguna berdasarkan email
                $query = "SELECT * FROM user_detail WHERE user_email = :email";
                $stmt = $this->koneksi->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Validasi password
                    if ($user && $user['user_password'] == $pass) {
                        // Jika email dan password sesuai, redirect ke home
                        header('Location: home.php?user_fullname=' . urlencode($user['user_fullname']));
                        exit();
                    } else {
                        return 'User atau password salah!';
                    }
                } else {
                    return 'User tidak ditemukan!';
                }
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        } else {
            return 'Data tidak boleh kosong!';
        }
    }
}

// Membuat instance koneksi
$db = new koneksi();
$login = new Login($db->koneksi);

$error = '';
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $error = $login->authenticate($email, $pass);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary">
    <div class="container mt-5">
        <div class="row justify-content-center" style="margin-top: 10rem;">
            <div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email" name="txt_email" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="txt_pass" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                        </div>
                    </form>
                    <!-- Tampilkan pesan error jika ada -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
