<?php
// Kelas induk ItemProduk
class ItemProduk {
    public $ukuran;
    public $warna;
    public $nama;

    public function setUkuran($ukuran) {
        $this->ukuran = $ukuran;
    }

    public function setWarna($warna) {
        $this->warna = $warna;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }
}

// Kelas Topi yang mewarisi ItemProduk
class Topi extends ItemProduk {
    public $model;

    public function setModel($model) {
        $this->model = $model;
    }
}

// Kelas Celana yang mewarisi ItemProduk
class Celana extends ItemProduk {
    public $tipe;
    public $model;

    public function setTipe($tipe) {
        $this->tipe = $tipe;
    }

    public function setModel($model) {
        $this->model = $model;
    }
}

// Kelas Baju yang mewarisi ItemProduk
class Baju extends ItemProduk {
    public $tipe;

    public function setTipe($tipe) {
        $this->tipe = $tipe;
    }
}

// Pengujian kelas
$topi = new Topi();
$topi->setNama("Topi Baseball");
$topi->setUkuran("L");
$topi->setWarna("Merah");
$topi->setModel("Snapback");

$celana = new Celana();
$celana->setNama("Celana Jeans");
$celana->setUkuran("32");
$celana->setWarna("Biru");
$celana->setTipe("Skinny");
$celana->setModel("Denim");

$baju = new Baju();
$baju->setNama("Baju Kaos");
$baju->setUkuran("M");
$baju->setWarna("Hitam");
$baju->setTipe("Polo");

// Menampilkan hasil
echo "Produk: {$topi->nama}, Ukuran: {$topi->ukuran}, Warna: {$topi->warna}, Model: {$topi->model}\n";
echo "Produk: {$celana->nama}, Ukuran: {$celana->ukuran}, Warna: {$celana->warna}, Tipe: {$celana->tipe}, Model: {$celana->model}\n";
echo "Produk: {$baju->nama}, Ukuran: {$baju->ukuran}, Warna: {$baju->warna}, Tipe: {$baju->tipe}\n";
?>
