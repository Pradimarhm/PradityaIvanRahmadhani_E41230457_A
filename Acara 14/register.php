<?php
require ('koneksi.php');
require ('query.php');

$obj = new crud;
if ($_SERVER['REQUEST_METHOD']=='post') :
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_name'];
    if ($obj->InsertData($email,$pass,$name)) :
        echo'<div class="alert alert-success">Data berhasil dismpan';
    else :
        echo '<div class="alert alert-danger">Data gagal disimpan';
    endif;
endif;
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
                                <input type="text" class="form-control"  id="nama" name="txt_name" placeholder="Masukkan Nama" required>
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