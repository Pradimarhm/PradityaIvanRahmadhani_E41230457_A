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
                    $_SESSION['user_email']=$userVal;
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
<body class="bg-primary">
    <div class="container mt-5" >
        <div class="row justify-content-center" style="margin-top: 10rem;">
                <div class="col-md-4 shadow-lg p-3 mb-5 rounded" style="background-color: white;" >
                    <div class="d-block p-2" >
                        <div class="card-header text-center">
                            <h3 >Login</h3>
                        </div>
                        <div>
                            <form action="login.php" method="POST">
                                <div class="mb-4">
                                    <label for="email" class="form-label" >Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan Email" name="txt_email"  required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label" >Password</label>
                                    <input type="password" class="form-control" placeholder="Masukkan Email" name="txt_pass"  required>
                                </div>
                                <div class="d-grid" style="margin-top: 6rem;">
                                    <button type="submit" class="btn btn-primary"  name="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>