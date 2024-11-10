<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa E-Jurnal SMEKTA</title>
    <link rel="stylesheet" href="../resource/css/siswa/siswadb.css">
</head>
<body>
    <nav>
        <h1>E-Jurnal PKL SMEKTA</h1>
        <img src="" alt="">
    </nav>
    <section class="section1" >
        <div class="backgroundDiv-section1" >
            <h2>Selamat datang Bayu Firmansayah</h2>
        </div>
    </section>

    <section class="section2" >
        <div class="display-section2" >
            <h3>Informasi Status Kegiatanmu</h3>
            <div class="container-section2" >
                <div class="Display" >
                    <h4>120</ph>
                    <p>proses</p>
                </div>
                <div class="DisplayLine" ></div>
                <div class="Display" >
                    <h4>120</h4>
                    <p>Di Terima</p>
                </div>
                <div class="DisplayLine" ></div>
                <div class="Display" >
                    <h4>120</h4>
                    <p>Di Tolak</p>
                </div>
            </div>
        </div>

        <div class="containerButton" >
            <div class="displayButton" >
                <div><img src="../resource/logo/regulation 2.png" alt=""></div>
                <p>Tata Tertib</p>
            </div>

            <div class="displayButton" >
                <div><img src="../resource/logo/engineering 2.png" alt=""></div>
                <p>DU/DI</p>
            </div>
            
            <div class="displayButton" >
                <div><img src="../resource/logo/clipboard.png" alt=""></div>
                <p>Kegiatan</p>                                            
            </div>

            <div class="displayButton" >
                <div><img src="../resource/logo/diploma.png" alt=""></div>
                <p>Observasi</p>
            </div>
        </div>
    </section>

    <section class="sectionLine" >
        <div></div>
    </section>

    <section class="section3" >
        <div class="conatiner-section3" >
            <h3>Tambahkan Kegiatanmu</h3>
            <div>
                <form action="post">
                    <label for="">Nama Kegiatan</label>
                    <input class="inputForm" placeholder="Masukkan Nama Kegiatan" type="text">


                    <label  for="">Deskripsi Kegiatan</label>
                    <textarea class="inputDesakripsi" placeholder="Masukkan Deskripsi" type="text"></textarea>

                    <label  for="">Tanggal Kegiatan</label>
                    <input class="inputForm" type="text">

                    <div>
                        <a href="">Batal</a>
                        <a href="">Tambah</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <?php include "../Layout/footerSiswa.php" ?>
    </footer>
</body>
</html>