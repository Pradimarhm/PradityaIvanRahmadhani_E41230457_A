<?php
    $hari;
    $bulan;
    $tahun;

    $tanggal = getdate();
    
    $hari = $tanggal['mday'];
    $bulan = $tanggal['mon'];
    $tahun = $tanggal['year'];
    

    echo "Tanggal hari ini:".$hari."-".$bulan."-".$tahun;