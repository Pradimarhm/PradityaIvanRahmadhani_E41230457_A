<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h2>Halaman Admin</h2>
    <br/>

    <!-- Cek apakah pengguna sudah login -->
    <?php
    session_start(); // Memulai session
    if ($_SESSION['status'] != "login") { // Jika status session bukan login, redirect ke halaman login
        header("location:../login.php?pesan=belum_login"); // Mengarahkan ke login.php jika belum login
    }
    ?>

    <!-- Menampilkan username pengguna yang login -->
    <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! Anda telah login.</h4>
    <br/><br/>
    
    <!-- Link untuk logout -->
    <a href="logout.php">LOGOUT</a>
</body>
</html>