<?php
// Kelas induk Tablet
class Tablet {
    public $merk;       // Public property
    protected $camera;  // Protected property
    private $memory;    // Private property

    // Constructor untuk inisialisasi
    public function __construct($merk, $camera, $memory) {
        $this->merk = $merk;
        $this->camera = $camera;
        $this->memory = $memory;
    }

    // Public method
    public function getDetails() {
        return "Merk: {$this->merk}, Camera: {$this->camera}MP, Memory: {$this->memory}GB";
    }

    // Protected method
    protected function getCamera() {
        return $this->camera;
    }

    // Private method
    private function getMemory() {
        return $this->memory;
    }
}

// Kelas turunan Handphone yang mewarisi Tablet
class Handphone extends Tablet {
    public $handphone_baru;

    public function __construct($merk, $camera, $memory, $handphone_baru) {
        parent::__construct($merk, $camera, $memory);
        $this->handphone_baru = $handphone_baru;
    }

    public function beli_handphone() {
        echo "Membeli Handphone baru: {$this->handphone_baru}\n";
    }

    // Mengakses properti dan method protected dari induk
    public function getHandphoneDetails() {
        return "Handphone {$this->merk} dengan kamera {$this->getCamera()}MP.";
    }

    // Mengakses properti private dari induk tidak diperbolehkan, ini akan error
    /*
    public function getMemoryDetails() {
        return "Memory handphone ini adalah {$this->getMemory()}GB.";
    }
    */
}

// Pengujian kelas Handphone
$hp = new Handphone("Samsung", 12, 128, "Samsung Galaxy S21");
echo $hp->getDetails();  // Akses public method dari induk
echo "\n";
echo $hp->getHandphoneDetails();  // Akses protected method dari induk
echo "\n";
$hp->beli_handphone();  // Akses public method dari kelas turunan
?>
