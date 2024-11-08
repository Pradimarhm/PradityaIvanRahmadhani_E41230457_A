<?php
session_start();
// Periksa apakah sesi login atau cookie sudah ada
if (isset($_SESSION['email']) || isset($_COOKIE['user_logged_in'])) {
    // Jika ya, alihkan pengguna ke halaman home
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        html,
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
        }

        .main-container {
            background-color: #e9ecef;
            height: 100vh;
        }

        .container-login {
            background-color: #fff;
            max-width: 400px;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container-login span {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        #closeButton {
            background-color: #007bff;
            /* Warna biru */
            border-color: #007bff;
            /* Menyesuaikan warna border */
        }
    </style>
    <title>Login - Manajemen Nilai</title>
</head>

<body>
    <div class="container-fluid main-container d-flex justify-content-center align-items-center">
        <div class="container-login d-flex flex-column gap-3 align-items-center">
            <span>Login - Manajemen Nilai</span>
            <form action="../Controller/loginController.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" name="login" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal untuk notifikasi login -->
    <div class="modal fade" id="loginAlert" tabindex="-1" aria-labelledby="loginAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginAlertLabel">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="alertMessage">
                    <!-- Pesan notifikasi login akan dimasukkan di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="closeButton">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        // Cek apakah terdapat pesan error di sesi
        <?php if (isset($_SESSION['login_error'])): ?>
            document.getElementById('alertMessage').innerText = "<?php echo $_SESSION['login_error']; ?>";
            var loginAlert = new bootstrap.Modal(document.getElementById('loginAlert'));
            loginAlert.show();
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>
    </script>
</body>

</html>