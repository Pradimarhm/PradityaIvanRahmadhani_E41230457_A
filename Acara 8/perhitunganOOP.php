<?php
// Definisikan kelas Calculator
class Calculator {
    // Metode untuk penjumlahan
    public function add($a, $b) {
        return $a + $b;
    }

    // Metode untuk pengurangan
    public function subtract($a, $b) {
        return $a - $b;
    }

    // Metode untuk perkalian
    public function multiply($a, $b) {
        return $a * $b;
    }

    // Metode untuk pembagian
    public function divide($a, $b) {
        if ($b == 0) {
            return "Error: Pembagian dengan nol!";
        }
        return $a / $b;
    }
}

// Contoh penggunaan kelas Calculator
$calculator = new Calculator();

// Masukan angka pertama dan kedua
$angka1 = 10;
$angka2 = 5;

// Melakukan perhitungan
echo "Penjumlahan: " . $calculator->add($angka1, $angka2) . "\n";        // Output: 15
echo "Pengurangan: " . $calculator->subtract($angka1, $angka2) . "\n";  // Output: 5
echo "Perkalian: " . $calculator->multiply($angka1, $angka2) . "\n";    // Output: 50
echo "Pembagian: " . $calculator->divide($angka1, $angka2) . "\n";      // Output: 2
?>
