<?php
session_start();
require_once '../Controller/nilaiController.php';

$level = $_SESSION['level'];
$nilaiController = new NilaiController();
$nilaiList = $nilaiController->getAllNilai(); // Ambil semua data nilai

?>

<div class="content-container p-0 m-3">
    <a href="Product/addView.php">
        <button class="btn btn-primary">Tambah Data</button>
    </a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Grade</th>
            <?php if (trim($level) == '1') { ?>
                <th colspan="2">Aksi</th>
            <?php } ?>
        </tr>
        </thead>

        <tbody>
        <?php
        if (!empty($nilaiList)) {
            foreach ($nilaiList as $nilai) {
                echo "<tr>";
                echo "<td>" . $nilai['id'] . "</td>";
                echo "<td>" . $nilai['nid_nim'] . "</td>";
                echo "<td>" . $nilai['nama_mahasiswa'] . "</td>";
                echo "<td>" . (isset($nilai['mata_kuliah']) ? htmlspecialchars($nilai['mata_kuliah']) : 'N/A') . "</td>";
                echo "<td>" . $nilai['nilai'] . "</td>";
                echo "<td>" . $nilai['semester'] . "</td>";
                echo "<td>" . $nilai['tahun_ajaran'] . "</td>";
                echo "<td>" . $nilai['grade'] . "</td>";
                if ($level == '1') {
                    echo "<td>
                            <a href='Product/updateView.php?action=update&id=" . $nilai['id'] . "'>
                                <button class='btn btn-warning'>Edit</button>
                            </a>
                          </td>";
                    echo "<td>
                            <a href='../Controller/nilaiController.php?action=delete&id=" . $nilai['id'] . "'>
                                <button class='btn btn-danger'>Hapus</button>
                          </a>
                          </td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='8'>Data Kosong</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
