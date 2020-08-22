<?php
// Variabel Scope / lingkup variabel

//  Scope Global
// $_GET, $_POST, $_REQUEST, $_SESSIION, $_COOKIE, $_SERVER, $_ENV = (Array Assosiatif)

$cars = [
    [
    "merk" => "Lamborghini Veyron",
    "color" => "White",
    "price" => "Rp8.900.000.000",
    "release" => "Feb",
    "image" => "6.jpg"
    ],
    [
    "merk" => "BMW i8 Roadster",
    "color" => "Black",
    "price" => "Rp3.989.000.000",
    "release" => "Aug",
    "image" => "2.jpg"
    ],
    [
    "merk" => "Stallone 812",
    "color" => "Black",
    "price" => "Rp5.989.000.000",
    "release" => "Aug",
    "image" => "3.jpg"
    ]
];

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>
<body>
<h1>Data :</h1>
    <ul>
        <?php foreach($cars as $car) : ?>
        <li>
        <a href="latihan2.php?merk=<?= $car["merk"]; ?>&color= <?= $car["color"];?>&price= <?= $car["price"];?>&release= <?= $car["release"];?>&image=<?= $car["image"];?>"><?= $car["merk"]; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>