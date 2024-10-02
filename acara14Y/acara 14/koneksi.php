<?php
class koneksi {
    public $koneksi; // Ubah ke public agar bisa diakses

    public function __construct() {
        try {
            $this->koneksi = new PDO("mysql:host=localhost;dbname=user", "root", "");
            // Set error mode to exception
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
