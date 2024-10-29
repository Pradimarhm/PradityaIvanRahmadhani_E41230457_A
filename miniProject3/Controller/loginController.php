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
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password']; // Ambil password dari form login

            // Hash password dengan MD5
            $hashedPassword = md5($password);

            // Query untuk mencari user berdasarkan email
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Debugging output
            echo "Email: $email<br>";
            echo "Password (hashed): $hashedPassword<br>";
            echo "Password from DB: " . ($result ? $result['password'] : 'User not found') . "<br>";

            if ($result) {
                // Verifikasi password yang di-hash menggunakan MD5
                if ($hashedPassword == $result['password']) {
                    session_start();
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['level'] = $result['level'];

                    echo "<script>window.location = '../Views/home.php';</script>";
                } else {
                    echo "<script>alert('Email atau Password salah');</script>";
                    echo "<script>window.location = '../Views/index.php';</script>";
                }
            } else {
                echo "<script>alert('Pengguna tidak ditemukan');</script>";
                echo "<script>window.location = '../Views/index.php';</script>";
            }
        }
    }
}

// Membuat instance dan memanggil fungsi login
$loginController = new loginController();
$loginController->login();

