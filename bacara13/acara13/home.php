<?php
    session_start();

    require("koneksi.php");
    // $email = $_GET['user_fullname'];
    if(!isset($_SESSION['user_email'])){
        header('login.php');
        exit();
    }

    $email = $_SESSION['user_email'];

    $stmt = $koneksi->prepare("SELECT user_fullname FROM user_detail WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_fullname = $row['user_fullname'];
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div class="container mt-5" style="margin-top: 10rem;">
        <h1 class="text-center" style="color: white;">Selamat Datang, <?php echo $user_fullname; ?></h1>

        <div style="margin-top: 4rem;">
            <table class="table table-striped table-hover mt-4">
                <thead class="table-dark" style="text-align: center;">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM user_detail";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;

                        // Looping data dari database ke tabel
                        while ($row = mysqli_fetch_array($result)) {
                            $userMail = $row['user_email'];
                            $userName = $row['user_fullname'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td> 
                        <td><?php echo $userMail; ?></td>
                        <td><?php echo $userName; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" >Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                        }      
                    ?>
                </tbody>
            </table>
        </div>

        
    </div>
</body>
</html>