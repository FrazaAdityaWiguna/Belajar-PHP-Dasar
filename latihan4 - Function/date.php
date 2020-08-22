<?php
// Build In Function

// DATE
// untuk menampilkan gambar dengan format tertentu
    // echo date("l, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 January 1970
    // echo time();

// echo date("l-M-Y", time()-60*60*24*100);

// Mktime
// membuat detik sendiri
// mktime(0,0,0,0,0,0,)
// jam, menit, detik, bulan, tanggal, tahun
// echo date ("l-M-Y",mktime(0,0,0,2,9,2002));

// strtotime
echo date("l", strtotime("09 feb 2002"));

?>

<!-- Sintaks PHP String -->
<!-- 
    strlen() = menghintung jumlah string (length)
    strcmp() = membandingkan 2 string
    explode() = memecah sebuah string menjadi array
    htmlspecialchars() = melindungi web dari hacker
 -->

 <!-- Sintaks PHP Utility -->
 <!-- 
    Var_dump() = mencetak isi dari sebuah variabel, array, object
    isset() = untuk mengecek apakah variabel tersebut sudah dibuat atau belum hasilnya adalah boolean
    empty() = mengcek isi variabel ada atau tidak
    die() = memberhentikan program
    sleep() = memberhentikan sementara
  -->