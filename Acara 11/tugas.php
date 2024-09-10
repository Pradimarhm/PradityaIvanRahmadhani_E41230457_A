<?php
// Interface hitungLuas
interface hitungLuas {
    public function hitungLuasPersegi($sisi);
    public function hitungLuasSegitiga($alas, $tinggi);
    public function hitungLuasLingkaran($jariJari);
}

// Class untuk menghitung luas persegi
class Persegi implements hitungLuas {
    public function hitungLuasPersegi($sisi) {
        return $sisi * $sisi;
    }

    public function hitungLuasSegitiga($alas, $tinggi) {
        // Implementasi tidak diperlukan di sini
    }

    public function hitungLuasLingkaran($jariJari) {
        // Implementasi tidak diperlukan di sini
    }
}

// Class untuk menghitung luas segitiga
class Segitiga implements hitungLuas {
    public function hitungLuasPersegi($sisi) {
        // Implementasi tidak diperlukan di sini
    }

    public function hitungLuasSegitiga($alas, $tinggi) {
        return 0.5 * $alas * $tinggi;
    }

    public function hitungLuasLingkaran($jariJari) {
        // Implementasi tidak diperlukan di sini
    }
}

// Class untuk menghitung luas lingkaran
class Lingkaran implements hitungLuas {
    const PHI = 3.14;

    public function hitungLuasPersegi($sisi) {
        // Implementasi tidak diperlukan di sini
    }

    public function hitungLuasSegitiga($alas, $tinggi) {
        // Implementasi tidak diperlukan di sini
    }

    public function hitungLuasLingkaran($jariJari) {
        return self::PHI * $jariJari * $jariJari;
    }
}

// Membuat objek dari masing-masing class
$persegi = new Persegi();
$segitiga = new Segitiga();
$lingkaran = new Lingkaran();

// Menghitung dan menampilkan hasil perhitungan
$sisiPersegi = 4;
echo "Luas Persegi dengan sisi $sisiPersegi: " . $persegi->hitungLuasPersegi($sisiPersegi) . " satuan persegi<br>";

$alasSegitiga = 5;
$tinggiSegitiga = 10;
echo "Luas Segitiga dengan alas $alasSegitiga dan tinggi $tinggiSegitiga: " . $segitiga->hitungLuasSegitiga($alasSegitiga, $tinggiSegitiga) . " satuan persegi<br>";

$jariJariLingkaran = 7;
echo "Luas Lingkaran dengan jari-jari $jariJariLingkaran: " . $lingkaran->hitungLuasLingkaran($jariJariLingkaran) . " satuan persegi<br>";
?>
