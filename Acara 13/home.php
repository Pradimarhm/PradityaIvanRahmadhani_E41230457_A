<?php
    require("koneksi.php");
    $email = $_GET['user_fullname'];
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
<body>
    <h1>Selamat Datang <?php echo $email;?></h1>
    <table border='1'>
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td><a href="edit.php?id=<?echo $row['id'];?>">edit</a>
                <a href="hapus.php?id=<?echo $row['id'];?>">hapus</a>
            </td>
        </tr>
        <?php
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while ($row = mysqli_fetch_array($result)) {
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];
            }      
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $userMail;?></td>
            <td><?php echo $userName;?></td>
            <td></td>
        </tr>
        <?php
            $no++;
        ?>
    </table>
</body>
</html>