<?php
// Array
// Variabel yang dapat memiliki banyak nilai
// Array pada PHP dapat memiliki banyak tipe data
// Pasangan antara key dan value
// key-nya adalah index yang dimulai dari 0

// membuat nilai
// cara lama
$hari = array("Senin", "Selasa", "Rabu");

// cara baru
$bulan = ["Janury", "February", "Maret"];
$arr1 = [123, "January", true];

// Menampilkan Array
// var_dump() / print_r()
$arr2 = ["Fraza", 9, "BigDream"];
// var_dump($arr2);
// echo "<br>";
// print_r($arr2);
// echo "<br>";

// Menampilkan satu element pada array
// echo $arr2[2];
// echo "<br>";
// echo $arr1[1]

// Menambahkan element baru pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jumat";
echo "<br>";
var_dump($hari);
?>