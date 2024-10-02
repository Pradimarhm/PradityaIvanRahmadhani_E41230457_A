<?php
// Interface untuk siswa yang memiliki kewajiban laporan
interface LaporanHarian {
    public function isiLaporan($laporan);
}

// Class Siswa yang menjadi parent class
class Siswa {
    // Encapsulation: Properti protected agar bisa diakses oleh child class
    protected $nama;
    protected $jurusan;
    protected $sekolah;

    // Constructor untuk inisialisasi data siswa
    public function __construct($nama, $jurusan, $sekolah) {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->sekolah = $sekolah;
    }

    // Getter untuk encapsulation
    public function getNama() {
        return $this->nama;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function getSekolah() {
        return $this->sekolah;
    }
}

// Class SiswaPKL yang mengimplementasikan interface dan menginherit class Siswa
class SiswaPKL extends Siswa implements LaporanHarian {
    // Encapsulation: Properti private
    private $laporanHarian = [];
    private $totalHariPKL;
    private $hariTerisi = 0;
    private $minimalKehadiran = 70; // Minimal kehadiran PKL dalam persen

    // Constructor untuk inisialisasi data siswa PKL
    public function __construct($nama, $jurusan, $sekolah, $totalHariPKL) {
        // Memanggil constructor parent class
        parent::__construct($nama, $jurusan, $sekolah);
        $this->totalHariPKL = $totalHariPKL;
    }

    public function getTotalHariPKL() {
        return $this->totalHariPKL;
    }

    public function getHariTerisi() {
        return $this->hariTerisi;
    }

    // Polimorfisme: Implementasi dari interface LaporanHarian
    public function isiLaporan($laporan) {
        // Operator dan percabangan untuk memastikan laporan tidak melebihi jumlah hari PKL
        if ($this->hariTerisi < $this->totalHariPKL) {
            $this->laporanHarian[] = $laporan;
            $this->hariTerisi++;
            return "Laporan untuk hari ke-" . $this->hariTerisi . " berhasil diisi.";
        } else {
            return "PKL selesai, tidak dapat mengisi laporan lebih banyak.";
        }
    }

    // Method yang menggunakan operator aritmatika dan perbandingan
    public function hitungPersentaseKehadiran() {
        // Operator aritmatika untuk menghitung persentase
        $persentase = ($this->hariTerisi / $this->totalHariPKL) * 100;
        return $persentase;
    }

    // Method untuk mengecek apakah siswa memenuhi minimal kehadiran PKL
    public function cekKehadiranMinimal() {
        // Operator perbandingan dan logika
        $persentase = $this->hitungPersentaseKehadiran();
        if ($persentase >= $this->minimalKehadiran) {
            return "Kehadiran memenuhi syarat (" . round($persentase) . "% dari " . $this->totalHariPKL . " hari).";
        } else {
            return "Kehadiran tidak memenuhi syarat. Baru " . round($persentase) . "% dari total " . $this->totalHariPKL . " hari.";
        }
    }

    // Method untuk menampilkan status siswa PKL
    public function getStatusPKL() {
        // Percabangan untuk melihat apakah PKL sudah selesai
        if ($this->hariTerisi >= $this->totalHariPKL) {
            return "Siswa PKL telah menyelesaikan PKL dengan total " . $this->totalHariPKL . " hari.";
        } else {
            return "Siswa PKL sedang dalam proses, " . ($this->totalHariPKL - $this->hariTerisi) . " hari lagi tersisa.";
        }
    }

    // Perulangan: Menampilkan semua laporan harian yang sudah diisi
    public function getLaporanHarian() {
        if (empty($this->laporanHarian)) {
            return "Belum ada laporan harian.";
        }

        $laporan = "Daftar Laporan Harian:<br>";
        foreach ($this->laporanHarian as $index => $isiLaporan) {
            $laporan .= "Hari ke-" . ($index + 1) . ": " . $isiLaporan . "<br>";
        }
        return $laporan;
    }
}

// Inisialisasi objek SiswaPKL
$siswa = new SiswaPKL("Budi", "Teknik Informatika", "SMK N 1 Nganjuk", 10);

// Mengisi beberapa laporan harian
echo $siswa->isiLaporan("Belajar membuat website.") . "<br>";
echo $siswa->isiLaporan("Melakukan debugging pada aplikasi.") . "<br>";
echo $siswa->isiLaporan("Membuat dokumentasi tugas PKL.") . "<br><br>";

// Menampilkan status siswa PKL
echo $siswa->getStatusPKL() . "<br><br>";

// Menampilkan semua laporan harian yang sudah diisi
echo $siswa->getLaporanHarian() . "<br>";

// Menampilkan persentase kehadiran dan cek apakah memenuhi minimal kehadiran
echo "Persentase Kehadiran: " . round($siswa->hitungPersentaseKehadiran()) . "%<br>";
echo $siswa->cekKehadiranMinimal();
?>