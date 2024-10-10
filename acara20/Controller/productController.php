<?php
require_once __DIR__ . '/../config/database.php';

class productController
{
    private $db;
    private $koneksi;

    public function __construct()
    {
        $this->db = new database();
        $this->koneksi = $this->db->getConnection();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->koneksi->prepare($query);
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function createProduct()
    {
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $stock = $_POST['stock'];

            $query = "INSERT INTO products (name, stock) VALUES (:name, :stock)";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':stock', $stock);
            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Data berhasil ditambahkan');</script>";
                echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Gagal menyimpan data');</script>";
            }
        }
    }

    public function updateProduct()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $stock = $_POST['stock'];

            $query = "UPDATE products SET name = :name, stock = :stock WHERE id = :id";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Data berhasil diubah');</script>";
                echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "<script type='text/javascript'>alert('Gagal mengubah data: " . $errorInfo[2] . "');</script>";
            }            
        }
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Data berhasil dihapus');</script>";
            echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Gagal menghapus data');</script>";
        }
        }
    }
}

if (isset($_GET['action'])){
    $controller = new productController();
    if($_GET['action'] == 'create'){
        $controller->createProduct();
    } else if($_GET['action'] == 'update'){
        $controller->updateProduct();
    } else if($_GET['action'] == 'delete'){
        $controller->deleteProduct();
    }
}

?>
