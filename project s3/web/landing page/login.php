<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan pesan error jika ada -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>

                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="txt_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="txt_pass" required>
                            </div>
                            <div class="d-grid">
                                <!-- Ganti btn-primary dengan btn-secondary atau kelas lain yang sesuai -->
                                <button type="submit" name="submit" class="btn btn-secondary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="register.php" class="btn btn-link">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>