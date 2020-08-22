<?php
// cek apakah tidak ada di $_GET
if ( !isset($_GET["merk"]) || 
    !isset($_GET["color"]) ||
    !isset($_GET["price"]) ||
    !isset($_GET["release"]) ||
    !isset($_GET["image"])
    ) {
    // Redirect
    header("Location: latihan1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Cars</title>
</head>
<body>
    <ul>
    <li><img src="img/<?= $_GET["image"]; ?>"></li>
    <li><?= $_GET["merk"]; ?></li>
    <li><?= $_GET["color"]; ?></li>
    <li><?= $_GET["price"]; ?></li>
    <li><?= $_GET["release"]; ?></li>
    </ul>
</body>

<a href="latihan1.php">Kembali</a>
</html>