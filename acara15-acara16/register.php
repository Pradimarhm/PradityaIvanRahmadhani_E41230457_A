<?php
require('koneksi.php');
require('query.php');

$obj = new crud;

if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_name'];

    if ($obj->insertData($email, $pass, $name)):
        $message = '<div class="alert alert-success">Data berhasil disimpan</div>';
    else:
        $message = '<div class="alert alert-danger">Data gagal disimpan</div>';
    endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan pesan jika ada -->
                        <?php if (isset($message)): ?>
                            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
                        <?php endif; ?>

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="txt_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="txt_pass" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="txt_name" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="register" class="btn btn-secondary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php" class="btn btn-link">Go to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
