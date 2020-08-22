<?php

$mahasiswa = [
    ["Fraza Aditya Wiguna", "09022002", "February", "Prorammer"],
    ["Dia", "05060808", "May", "All"],
    ["kd", "23102017", "september", "done"],

];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
</head>
<body>
    <h1>Data :</h1>

   
       <!-- <?php foreach( $mahasiswa as $mhs) : ?>
        <li><?= $mhs ?></li>
       <?php endforeach; ?> -->

       <?php foreach( $mahasiswa as $mhs) : ?>
       <ul>
           <li>Nama : <?= $mhs[0]; ?></li>
           <li>Tanggal : <?= $mhs[1]; ?></li>
           <li>Bulan : <?= $mhs[2]; ?></li>
           <li>Result : <?= $mhs[3]; ?></li>
       </ul>
       <?php endforeach; ?>
    







</body>
</html>