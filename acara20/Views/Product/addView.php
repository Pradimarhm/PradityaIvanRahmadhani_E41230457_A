<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Style -->
    <style>
        home,
        html {
            width: 100%;
            height: 100vh;
            min-height: 100%;
        }

        .root-container {
            height: 100%;
            width: 100%;
        }

        .navbar {
            width: 100%;
            height: 40px;
            background-color: #e9ecef;
        }
    </style>

    <title>Home</title>
</head>

<body>
    <div class="container-fluid root-container m-0 p-0 w-100 h-100 d-flex flex-column row-gap-3">
        <?php
        require_once '../Layout/navbar.php';
        ?>

        <form action="../../Controller/productController.php?action=create" method="post" class="d-flex gap-2">
            <div class="field-name">
                <label for="nama">Nama Produk</label>
                <input type="text" name="name" required>
            </div>
            <div class="field-stock">
                <label for="stock">Stock</label>
                <input type="number" name="stock" required>
            </div>
            <button class="btn btn-primary" name="add">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>