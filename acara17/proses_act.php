<?php
include 'koneksi.php';
$limit = 10 * 1024 * 1024;
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$jumlahFile = count($_FILES['foto']['name']);

for ($x = 0; $x < $jumlahFile; $x++) {
    $namafile = $_FILES['foto']['name'][$x];
    $tmp = $_FILES['foto']['tmp_name'][$x];
    $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['foto']['size'][$x];

    if ($ukuran > $limit) {
        header("location:index.php?alert=gagal_ukuran");
        exit();
    } 
    
    else {
        if (!in_array(strtolower($tipe_file), $ekstensi)) {
            header("location:index.php?alert=gagal_ektensi");
            exit();
        } 
        
        else {
            move_uploaded_file($tmp, 'file/' . date('d-m-Y') . '-' . $namafile);
            $x = date('d-m-Y') . '-' . $namafile;
            mysqli_query($koneksi, "INSERT INTO gambar VALUES(NULL, '$x')");
            header("location:index.php?alert=simpan");
            exit();
        } 
    }
}

