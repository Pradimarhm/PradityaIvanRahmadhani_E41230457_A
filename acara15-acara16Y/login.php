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

                    // Periksa password
                    if ($user && $user['user_password'] == $pass) {
                        // Mulai sesi dan set cookie jika login berhasil
                        session_start();
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_fullname'] = $user['user_fullname'];

                        // Set cookie untuk login (misalnya, 1 minggu)
                        setcookie('user_email', $email, time() + (7 * 24 * 60 * 60), "/");
                        setcookie('user_fullname', $user['user_fullname'], time() + (7 * 24 * 60 * 60), "/");

                        header('Location: home.php');
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
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan pesan error jika ada -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>

                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="txt_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="txt_pass" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="register.php" class="btn btn-link">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
