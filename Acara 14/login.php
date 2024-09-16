<?php
$koneksi = mysqli_connect("localhost","root","","user");
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM user_detail WHERE user_email = $email";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
        }

        if ($num == 0) {
            if ($userVal=$email && $passVal=$pass){
                header('location home.php');
            }else{
                $error = 'user atau password salah';
                header('location: login.php');
            }
        }else{
            $error = 'user tidak ditemukan';
            header('location: login.php');
        }
    }else{
        $error = 'data tidak boleh kosong';
        echo $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <p>email <input type="text" name="txt_name" ></p>
        <p>password : <input type="password" name="txt_pass" ></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
</body>
</html>