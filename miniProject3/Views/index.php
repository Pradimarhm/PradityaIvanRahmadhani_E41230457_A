<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style -->
    <style>
        /* Root */
        html,
        body {
            width: 100%;
            min-height: 100vh;
            height: 100vh;
            margin: 0; /* Remove default margin */
        }

        /* Main Container */
        .main-container {
            background-color: #e9ecef;
        }

        /* Container Login */
        .container-login {
            background-color: #fff;
            width: 100%;
            max-width: 400px; /* Set a max width for responsiveness */
            padding: 2rem; /* Add padding for better spacing */
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        .container-login span {
            margin-bottom: 1.5rem; /* Space below the title */
            font-size: 1.5rem;
            font-weight: bold; /* Bold title for emphasis */
        }

        .button-container {
            margin-top: 1.5rem; /* Space above the button */
        }
    </style>
    <title>Login - Manajemen Nilai</title> <!-- Update the title -->
</head>

<body>
<!-- Container -->
<div class="container-fluid m-0 p-0 w-100 h-100 main-container d-flex align-items-center justify-content-center">
    <div class="container-login d-flex flex-column gap-3 align-items-center">
        <span>Login - Manajemen Nilai</span> <!-- Updated header -->
        <form action="../Controller/loginController.php" method="post">
            <div class="container-input-control d-flex flex-column gap-2">
                <div class="input-email d-flex flex-column">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" class="form-control" required>
                </div>
                <div class="input-password d-flex flex-column">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="form-control" required>
                </div>
            </div>
            <div class="button-container d-flex justify-content-center">
                <button class="btn btn-primary" name="login" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>