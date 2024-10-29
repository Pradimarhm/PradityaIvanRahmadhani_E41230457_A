<?php
    
require_once 'C:\Users\pradi\OneDrive\Documents\GitHub\PradityaIvanRahmadhani_E41230457_A\miniProject3\Controller\nilaiController.php';

$nilaiController = new NilaiController();
$nilai = $nilaiController->getNilaiById($_GET['id']);
?>



<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .root-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .navbar {
            width: 100%;
            height: 60px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.2rem;
        }

        form {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 8rem;
        }
    </style>

    <title>Input Data Nilai</title>
</head>

<body>
    <div class="container-fluid root-container">
        <!-- Navbar -->
        <div class="navbar">
            <span class="navbar-brand">E-Jurnal PKL</span>
            <img src="../assets/logosmekta1.png" alt="Logo Smekta" height="40">
        </div>

        <!-- Form Input Data Nilai -->
        <form action="../../Controller/nilaiController.php?action=Update" method="post">
        
            <input type="hidden" name="id" value="<?php echo $nilai['id'] ?>">
            <div class="mb-3">
                <label for="NIM" class="form-label">ID Mahasiswa (NIM/NID)</label>
                <input type="text" name="NIM" class="form-control" id="NIM" value="<?php echo $nilai['NIM']?>" required placeholder="Masukkan NIM atau NID mahasiswa" >
            </div>

            <div class="mb-3">
                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah" class="form-select" id="mata_kuliah" required>
                    <option value="Workshop Sistem Informasi berbasis Web" <?php echo ($nilai['mata_kuliah'] == "Workshop Sistem Informasi berbasis Web") ? 'selected' : ''; ?>>Workshop Sistem Informasi berbasis Web</option>
                    <option value="Workshop Sistem Informasi berbasis Mobile" <?php echo ($nilai['mata_kuliah'] == "Workshop Sistem Informasi berbasis Mobile") ? 'selected' : ''; ?>>Workshop Sistem Informasi berbasis Mobile</option>
                    <option value="Workshop Kualitas Perangkat Lunak" <?php echo ($nilai['mata_kuliah'] == "Workshop Kualitas Perangkat Lunak") ? 'selected' : ''; ?>>Workshop Kualitas Perangkat Lunak</option>
                    <option value="Matematika Diskrit" <?php echo ($nilai['mata_kuliah'] == "Matematika Diskrit") ? 'selected' : ''; ?>>Matematika Diskrit</option>
                    <option value="Konsep jaringan Komputer" <?php echo ($nilai['mata_kuliah'] == "Konsep jaringan Komputer") ? 'selected' : ''; ?>>Konsep jaringan Komputer</option>
                    <option value="Struktur Data" <?php echo ($nilai['mata_kuliah'] == "Struktur Data") ? 'selected' : ''; ?>>Struktur Data</option>
                    <option value="Interpersonal Skill" <?php echo ($nilai['mata_kuliah'] == "Interpersonal Skill") ? 'selected' : ''; ?>>Interpersonal Skill</option>
                </select>
                <!-- <input type="text" name="mata_kuliah" class="form-control" id="mata_kuliah" required placeholder="Masukkan mata kuliah"> -->
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control" id="nilai" value="<?php echo $nilai['nilai']?>" min="0" max="100" required placeholder="Masukkan nilai">
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select name="semester" class="form-select" id="semester" value="<?php echo $nilai['semester']?>" required>
                    <option value="1" <?php echo ($nilai['semester'] == "1") ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($nilai['semester'] == "2") ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($nilai['semester'] == "3") ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($nilai['semester'] == "4") ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo ($nilai['semester'] == "5") ? 'selected' : ''; ?>>5</option>
                    <option value="6" <?php echo ($nilai['semester'] == "6") ? 'selected' : ''; ?>>6</option>
                    <option value="7" <?php echo ($nilai['semester'] == "7") ? 'selected' : ''; ?>>7</option>
                </select>
                <!-- <input type="text" name="semester" class="form-control" id="semester" required placeholder="Masukkan semester"> -->
            </div>

            <div class="mb-3">
                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="<?php echo $nilai['tahun_ajaran']?>" required placeholder="Masukkan tahun ajaran">
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select name="grade" class="form-select" id="grade" value="<?php echo $nilai['grade']?>" required>
                    <option value="A" <?php echo ($nilai['grade'] == "A") ? 'selected' : ''; ?>>A</option>
                    <option value="B" <?php echo ($nilai['grade'] == "B") ? 'selected' : ''; ?>>B</option>
                    <option value="C" <?php echo ($nilai['grade'] == "C") ? 'selected' : ''; ?>>C</option>
                    <option value="D" <?php echo ($nilai['grade'] == "D") ? 'selected' : ''; ?>>D</option>
                </select>
            </div>

            <button class="btn btn-primary w-100" type="submit" name="update">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
