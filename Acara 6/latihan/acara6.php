<?php
    // Matriks A
    $A = [
        [1, 1, 1],
        [2, 2, 2],
        [3, 3, 3]
    ];

    // Matriks B
    $B = [
        [3, 3, 3],
        [2, 2, 2],
        [1, 1, 1]
    ];

    // Matriks hasil penjumlahan
    $HasilPenjumlahan = [];

    // Proses penjumlahan matriks A dan B
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $HasilPenjumlahan[$i][$j] = $A[$i][$j] + $B[$i][$j];
        }
    }

    // Menampilkan matriks hasil
    echo "Hasil penjumlahan matriks A dan B adalah:<br>";

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo $HasilPenjumlahan[$i][$j] . " ";
        }
        echo "\n";
    }
?>
