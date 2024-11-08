<?php
require_once __DIR__ . '/../config/database.php';

// BaseController.php
class BaseController
{
    protected $db;
    protected $koneksi;

    public function __construct()
    {
        $this->db = new Database();
        $this->koneksi = $this->db->getConnection();
    }

    // Tambahkan metode umum lain jika diperlukan
}

// NilaiInterface.php
interface NilaiInterface
{
    public function getAllNilai();
    public function getNilaiById($id);
    public function createNilai();
    public function updateNilai();
    public function deleteNilai();
}


class NilaiController extends BaseController implements NilaiInterface
{

    public function __construct()
    {
        $this->db = new database();
        $this->koneksi = $this->db->getConnection();

    }
    public function getAllNilai()
    {
        // Mengambil semua data nilai dan nama mahasiswa dari tabel
        $query = "SELECT n.id, u.nid_nim, u.nama AS nama_mahasiswa, n.mata_kuliah, n.nilai, n.semester, n.tahun_ajaran, n.grade
                  FROM nilai n
                  JOIN users u ON n.NIM = u.nid_nim";

        // Siapkan dan eksekusi query
        $stmt = $this->koneksi->prepare($query);
        $stmt->execute();

        // Ambil semua hasil dan kembalikan sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getNilaiById($id)
    {
        $query = "SELECT * FROM nilai WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $nilai = $stmt->fetch(PDO::FETCH_ASSOC);
        return $nilai;
    }

    public function createNilai()
    {
        if (isset($_POST['create'])) {
            $mahasiswa_id = $_POST['NIM'];
            $mata_kuliah = $_POST['mata_kuliah'];
            $nilai = $_POST['nilai'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            $semester = $_POST['semester'];
            $grade = $_POST['grade'];

            $query = "INSERT INTO nilai (NIM, mata_kuliah, nilai, semester, tahun_ajaran, grade) VALUES (:mahasiswa_id, :mata_kuliah, :nilai, :semester,
            :tahun_ajaran, :grade)";

            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':mahasiswa_id', $mahasiswa_id);
            $stmt->bindParam(':mata_kuliah', $mata_kuliah);
            $stmt->bindParam(':nilai', $nilai);
            $stmt->bindParam(':semester', $semester);
            $stmt->bindParam(':tahun_ajaran', $tahun_ajaran);
            $stmt->bindParam(':grade', $grade);

            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Data berhasil ditambahkan');</script>";
                echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Gagal menyimpan data');</script>";
            }
        }
    }

    public function updateNilai()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $matkul = $_POST['mata_kuliah'];
            $NIM = $_POST['NIM'];
            $nilai = $_POST['nilai'];
            $semester = $_POST['semester'];
            $tahunAjaran = $_POST['tahun_ajaran'];
            $grade = $_POST['grade'];

            $query = "UPDATE nilai SET NIM = :NIM , mata_kuliah = :mata_kuliah, nilai = :nilai, semester = :semester, tahun_ajaran = :tahun_ajaran, grade = :grade WHERE id = :id";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':NIM', $NIM);
            $stmt->bindParam(':mata_kuliah', $matkul);
            $stmt->bindParam(':nilai', $nilai);
            $stmt->bindParam(':semester', $semester);
            $stmt->bindParam(':tahun_ajaran', $tahunAjaran);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Data berhasil diubah');</script>";
                echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "<script type='text/javascript'>alert('Gagal mengubah data: " . $errorInfo[2] . "');</script>";
            }
        }
    }

    public function deleteNilai()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->koneksi->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Data berhasil dihapus');</script>";
                echo "<script type='text/javascript'>window.location = '../Views/home.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Gagal menghapus data');</script>";
            }
        }
    }
}

if (isset($_GET['action'])) {
    $controller = new nilaiController();
    if ($_GET['action'] == 'create') {
        $controller->createNilai();
    } else if ($_GET['action'] == 'Update') {
        $controller->updateNilai();
    } else if ($_GET['action'] == 'delete') {
        $controller->deleteNilai();
    }
}

?>