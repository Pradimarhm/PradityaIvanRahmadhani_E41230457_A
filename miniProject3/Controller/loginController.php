<?php
require_once __DIR__ . '/../config/database.php';

class loginController
{
    private $db;
    private $koneksi;


    public function __construct()
    {
        $this->db = new database();
        $this->koneksi = $this->db->getConnection();
    }

    public function login()
    {
        session_start();

        // Inisialisasi login attempts jika belum ada
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = time();
        }

        // Cek waktu blok selama 5 menit setelah 3 kali gagal
        $currentTime = time();
        if ($_SESSION['login_attempts'] >= 3) {
            // Jika kurang dari 5 menit sejak percobaan terakhir
            if (($currentTime - $_SESSION['last_attempt_time']) < 5) {
                $_SESSION['login_error'] = 'Akun dikunci setelah 3 kali percobaan gagal. Silakan coba lagi setelah 5 menit.';
                // echo "akun dikunci";
                echo "<script>window.location = '../Views/home.php';</script>";
                return;
            } else {
                // Reset attempts jika lebih dari 5 menit
                $_SESSION['login_attempts'] = 0;
            }
        }

        // Proses login jika form dikirim
        if (isset($_POST['login']) && $_SESSION['login_attempts'] < 3) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashedPassword = md5($password);

            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                if ($hashedPassword == $result['password']) {
                    // Reset login attempts jika login berhasil
                    $_SESSION['login_attempts'] = 0;
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['level'] = $result['level'];

                    // Set cookie untuk sesi pengguna
                    setcookie('user_logged_in', 'true', time() + 3600, "/");
                    setcookie('email', $result['email'], time() + 3600, "/");
                    setcookie('level', $result['level'], time() + 3600, "/");

                    echo "<script>window.location = '../Views/home.php';</script>";
                    exit;
                } else {
                    // Tambahkan percobaan login jika password salah
                    $_SESSION['login_attempts']++;
                    $_SESSION['last_attempt_time'] = time();
                    $_SESSION['login_error'] = 'Email atau Password salah';
                }
            } else {
                // Jika email tidak ditemukan
                $_SESSION['login_error'] = 'Pengguna tidak ditemukan';
            }

            // Redirect kembali ke halaman login jika gagal
            echo "<script>window.location = '../Views/index.php';</script>";
        }
    }
}

// Membuat instance dan memanggil fungsi login
$loginController = new loginController();
$loginController->login();
?>
