<?php

require_once __DIR__ . '/vendor/autoload.php';

// require atau include
require 'functions.php';
// query menentukan hasil dari table
$mahasiswa = query("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table class="table" border="1" cellspacing="0" cellpadding="10">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>';
                    $i = 1;
                    foreach( $mahasiswa as $row) {
                        $html .= '<tr>
                                    <td>'. $i++ .'</td>
                                    <td><img src="img/'. $row["gambar"].'" width="50"></td>
                                    <td>'. $row["Nrp"] .'</td>
                                    <td>'. $row["Nama"] .'</td>
                                    <td>'. $row["email"] .'</td>
                                    <td>'. $row["jurusan"] .'</td>
                                </tr>';
                    }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('mahasiswa.pdf', 'D');

?>