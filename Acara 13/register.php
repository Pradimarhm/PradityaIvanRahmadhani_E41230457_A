<?php
    require('koneksi.php');
    if (isset($_POST['register'])) {
        $userMail = $_POST['txt_email'];
        $userPass = $_POST['txt_pass'];
        $userName = $_POST['txt_nama'];

        

        $query = "INSERT INTO `user_detail`(`user_email`, `user_password`, `user_fullname`, `level`) VALUES ('$userMail','$userPass','$userName','2')";
        $stmt = mysqli_prepare($koneksi, $query);

        $result = mysqli_stmt_execute($stmt);

        if ($result===true) {
            header('Location: login.php');
            exit();
        } else {
            $error = "Pendaftaran gagal. Silakan coba lagi.";
        }

        mysqli_stmt_close($stmt);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        input::placeholder {
            color: white;
        }
    </style>
</head>
<body class="bg-primary">
    <div class="container mt-5">
        <div class="row justify-content-center " style="margin-top: 10rem;">
            <div class=" col-md-4 shadow-lg p-3 mb-5 rounded" style="background-color: white;">
                <div style="display: flex;" class="d-block p-2">
                    <div class="card-header text-center " >
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="register.php" method="post">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control"  id="email" name="txt_email" placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="form-label" >Nama Pengguna</label>
                                <input type="text" class="form-control"  id="nama" name="txt_nama" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label" >Password</label>
                                <input type="password" class="form-control"  id="password" name="txt_pass" placeholder="Masukkan password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="register" class="btn btn-primary" style="margin-top: 4rem;">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="register.php" method="POST">
        <p>email $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;: <input type="text" name="txt_email" require></p>
        <p>password: <input type="password" name="txt_pass" require></p>
        <p>nama $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;:: <input type="text" name="txt_nama" require></p>
        <button type="submit" name="register">Register</button>
        <p> <a href="login.php">Login</p>
    </form>
</body>
</html> -->


