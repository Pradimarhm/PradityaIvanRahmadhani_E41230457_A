<?php
    function bilanganTerbesar($bilangan1, $bilangan2){
        if($bilangan1<$bilangan2){
            return $bilangan2;
        } else if($bilangan1>$bilangan2){
            return $bilangan1;
        }
    }

    // Mendapatkan nilai dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan1 = $_POST['bilangan1'];
        $bilangan2 = $_POST['bilangan2'];

        // Memanggil fungsi dan menyimpan hasilnya
        $hasil = bilanganTerbesar($bilangan1, $bilangan2);

        echo "Bilangan terbesar adalah: " . $hasil;

        // Simpan hasil dalam variabel session agar bisa diakses di halaman HTML
        
    }

    $terbesarrr = bilanganTerbesar($bilangan1,$bilangan2);
    echo "Bilangan $bilangan1 dan bilangan $bilangan2 yang terbesar adalah $terbesarrr";
