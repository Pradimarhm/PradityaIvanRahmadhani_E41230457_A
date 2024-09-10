<?php
    require('koneksi.php');

    session_start();

    if (isset($_POST['submit'])) {
        $email = $_POST['txt_email'];
        $pass = $_POST['txt_pass'];

        if (!empty($email)&&!empty($pass)) {
            $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
            $result = mysqli_query($koneksi,$query);
            $num = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $userVal = $row['user_email'];
                $passVal = $row['user_password'];
                $userName = $row['user_fullname'];
                $level = $row['level'];
            }

            if ($num != 0) {
                if ($userVal==$email && $passVal==$pass) {
                    header('location: home.php');
                }else{
                    $error = 'user atau password salah!!';
                    header('location: login.php');
                }
            }else{
                $error = 'data tidak boleh kosong';
                echo $error;
            }
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="login.php" method="POST">
        <p>email $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;: <input type="text" name="txt_email"></p>
        <p>password : <input type="password" name="txt_pass"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
</body>
</html>