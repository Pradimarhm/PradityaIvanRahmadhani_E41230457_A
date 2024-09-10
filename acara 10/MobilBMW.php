<?php
// Definisi kelas mobilLengkap
class mobilLengkap {
    public function nontonTV() {
        echo "TV dihidupkan. Mencari Chanel... Menampilkan gambar.\n";
    }
    
    public function hidupkanMobil() {
        echo "Mobil dihidupkan.\n";
    }
    
    public function matikanMobil() {
        echo "Mobil dimatikan.\n";
    }
    
    public function ubahGigi() {
        echo "Gigi mobil diubah.\n";
    }
}

// Kelas MobilBMW yang mewarisi kelas mobilLengkap
class MobilBMW extends mobilLengkap {
    // Kelas ini dapat menggunakan semua method dari kelas mobilLengkap
}

// Kelas MobilBMWberaksi untuk menguji fungsionalitas
class MobilBMWberaksi {
    public function nontonTv() {
        $mobil = new MobilBMW();
        $mobil->nontonTV();
    }
    
    public function hidupkanMobil() {
        $mobil = new MobilBMW();
        $mobil->hidupkanMobil();
    }
    
    public function matikanMobil() {
        $mobil = new MobilBMW();
        $mobil->matikanMobil();
    }
    
    public function ubahGigi() {
        $mobil = new MobilBMW();
        $mobil->ubahGigi();
    }
}

// Pengujian kelas MobilBMWberaksi
$aksi = new MobilBMWberaksi();
$aksi->nontonTv();
$aksi->hidupkanMobil();
$aksi->matikanMobil();
$aksi->ubahGigi();
?>
