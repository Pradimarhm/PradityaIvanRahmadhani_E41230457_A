<?php
require("koneksi.php");

// Create an instance of the koneksi class
$db = new koneksi();
$koneksi = $db->koneksi; // Access the PDO connection object

if (isset($_POST['update'])) {
    $userId = $_POST['id'];
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    try {
        // Prepare the query to prevent SQL injection
        $query = "UPDATE user_detail SET user_password=:pass, user_fullname=:name WHERE id=:id";
        $stmt = $koneksi->prepare($query);

        // Bind parameters
        $stmt->bindParam(':pass', $userPass);
        $stmt->bindParam(':name', $userName);
        $stmt->bindParam(':id', $userId);

        // Execute the query
        $stmt->execute();

        // Redirect on success
        header('Location: home.php');
        exit();
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}

// Fetch user details based on the id from GET
$id = $_GET['id'];
try {
    $query = "SELECT * FROM user_detail WHERE id=:id";
    $stmt = $koneksi->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $idUser = $row['id'];
        $userMail = $row['user_email'];
        $userPass = $row['user_password'];
        $userName = $row['user_fullname'];
    } else {
        echo "User not found!";
    }
} catch (PDOException $e) {
    echo "Error fetching user details: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-primary">
    <div style="margin-top: 10rem;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header text-center bg-dark text-white">
                            <h3>Edit Akun</h3>
                        </div>
                        <div class="card-body">
                            <form action="edit.php" method="post">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($idUser); ?>">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="txt_email" value="<?php echo htmlspecialchars($userMail); ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="txt_pass" value="<?php echo htmlspecialchars($userPass); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="txt_nama" value="<?php echo htmlspecialchars($userName); ?>">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="home.php" class="btn btn-link">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
