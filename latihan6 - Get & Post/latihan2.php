<?php
// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
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

    <?php foreach($cars as $car) : ?>
    <ul>
    <li>
        <img src="img/<?= $car["image"] ?>" alt="">
    </li>
    <li>Name : <?= $car["merk"] ?></li>
    <li>Number : <?= $car["color"] ?></li>
    <li>Call Name : <?= $car["price"] ?></li>
    <li>Bulan : <?= $car["release"] ?></li>
    </ul>
    <?php endforeach; ?>
    
</body>
</html>