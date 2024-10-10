<!DOCTYPE html>
<html>
<head>
    <title>Login MD5 - www.jti.com</title>
</head>
<body>
    <h2>Login MD5 - www.jti.com</h2>
    <br/>

    <!-- Cek pesan notifikasi dari URL (pesan login gagal, logout, atau belum login) -->
    <?php
    if (isset($_GET['pesan'])) { // Memeriksa apakah parameter 'pesan' ada di URL
        if ($_GET['pesan'] == "gagal") { // Pesan jika login gagal
            echo "Login gagal! Username atau password salah!";
        } else if ($_GET['pesan'] == "logout") { // Pesan jika berhasil logout
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") { // Pesan jika mencoba akses halaman admin tanpa login
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <br/><br/>

    <!-- Form login untuk input username dan password -->
    <form method="post" action="cek_login.php"> <!-- Mengirim data ke cek_login.php dengan metode POST -->
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan username" required></td> <!-- Input username, wajib diisi -->
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" placeholder="Masukkan password" required></td> <!-- Input password, wajib diisi -->
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="LOGIN"></td> <!-- Tombol submit untuk login -->
            </tr>
        </table>
    </form>
</body>
</html>