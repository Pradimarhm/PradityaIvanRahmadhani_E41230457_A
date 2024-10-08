<?php
require ('koneksi.php');
require ('query.php');

$koneksi = mysqli_connect("localhost","root","","user");
$obj = new crud();
$error = "";
if (isset($_POST['submit'])) {
    $emailU = $_POST['txt_email'];
    $passU = $_POST['txt_pass'];

    if ($obj->loginn($emailU, $passU)) :
        echo'<div class="alert alert-success">berhasil login ';
    else :
        echo '<div class="alert alert-danger">gagal login ';
    endif;
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
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>