<?php
    require("koneksi.php");
    $id = $_GET['id'];
    $query = "SELECT * FROM user_detail WHERE id='$id'";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    while ($row = mysqli_fetch_array($result)) {
        $idUser = $row['id'];
        $userMail = $row['user_email'];
        $userPass = $row['user_password'];
        $userName = $row['user_fullname'];
    }

    if (isset($_POST['update'])) {
        $userId = $idUser;
        $userMail = $_POST['txt_email'];
        $userPass = $_POST['txt_pass'];
        $userName = $_POST['txt_nama'];

        $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id='$userId'";
        echo $query;
        $result = mysqli_query($koneksi,$query);
        header('location: login.php');

    }
    
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="edit.php" method="POST">
        <p><input type="hidden" name="id" value="<?php echo $id;?>"></p>
        <p>email $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;: <input type="text" name="txt_email" value="<?php echo $userMail?>" readonly></p>
        <p>password: <input type="password" name="txt_pass" value="<?php echo $userPass;?>"></p>
        <p>nama $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;: <input type="text" name="txt_nama" value="<?php echo $userName?>"></p>
        <button type="submit" name="update">Update</button>

    </form>
    <p><a href="home.php">Kembali</a></p>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div style="margin-top: 10rem;">
        <div class="container mt-5" >
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Edit Akun</h3>
                        </div>
                        <div class="card-body">
                            <form action="edit.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id;?>">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="txt_email" value="<?php echo $userMail?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="txt_pass" value="<?php echo $userPass;?>">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="txt_nama" value="<?php echo $userName?>">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="home.php" class="btn btn-link">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
