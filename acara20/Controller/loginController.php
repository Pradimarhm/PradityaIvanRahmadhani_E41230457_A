<?php
require_once __DIR__ .'/../config/database.php';
class loginController
{
    private $db;
    private $koneksi;
    function __construct()
    {
        $this->db = new database();
        $this->koneksi = $this->db->getConnection();
    }

    public function login()
    {
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($result)){
                if ($username == $result['username'] && $password == $result['password']) {
                    session_start();
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['level'] = $result['level'];
                    echo "<script>window.location = '../Views/home.php';</script>";
                } else {
                    echo "<script>alert('Username atau Password salah');</script>";
                    echo "<script>window.location = '../Views/index.php';</script>";
                }
            } else{
                echo "<script>alert('Pengguna tidak ditemukan');</script>";
                echo "<script>window.location = '../Views/index.php';</script>";
            }
        }
    }
}

$loginController = new loginController();
$loginController->login();