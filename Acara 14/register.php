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
    <title>Register</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>email <input type="text" name="txt_name" require></p>
        <p>password <input type="password" name="txt_pass" require></p>
        <p>nama <input type="text" name="txt_name" require></p>
        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">Login</a></p>
</body>
</html>