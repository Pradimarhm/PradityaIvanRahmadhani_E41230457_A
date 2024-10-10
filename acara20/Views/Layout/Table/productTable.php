<?php
session_start();
require_once '../Controller/productController.php';

$level = $_SESSION['level'];
$productController = new ProductController();
$produk = $productController->getAllProducts();

?>

<div class="content-container p-0 m-3">
    <a href="Product/addView.php">
        <button class="btn btn-primary">Tambah Data</button>
    </a>
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nama Produk</td>
            <td>Stock</td>
            <?php
            if (trim($level) == 'admin') {
            echo '<td colspan="2">' . "Aksi" .'</td>';
            }
            ?>
        </tr>
        </thead>

        <tbody>
        <?php
        if (!empty($produk)) {
            foreach ($produk as $product) {
                echo "<tr>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td>" . $product['name'] . "</td>";
                echo "<td>" . $product['stock'] . "</td>";
                if ($level == 'admin') {
                echo "<td>
                            <a href='Product/updateView.php?action=update&id=" . $product['id'] . "'><button class='btn btn-warning'>Edit</button></a>
                            <a href='../Controller/productController.php?action=delete&id=" . $product['id'] . "'><button class='btn btn-danger'>Hapus</button></a>
                       </td>";
                echo "</tr>";
                }
            }
        } else {
            echo "<tr>";
            echo "<td colspan='4'>Data Kosong</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

</div>