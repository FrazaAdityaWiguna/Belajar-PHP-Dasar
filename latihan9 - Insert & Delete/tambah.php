<?php 
require 'functions.php';

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {


    // cek apakah data ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

<form method="POST" action="">
    <ul>
        <li>
            <label for="Nama">Nama :</label>
            <input type="text" name="Nama" id="Nama" required>
        </li>
        <li>
        <label for="Nrp">Nrp :</label>
        <input type="text" name="Nrp" id="Nrp" required>
        </li>
        <li>
            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="jurusan">Jurusan :</label>
            <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
            <label for="gambar">Gambar :</label>
            <input type="text" name="gambar" id="gambar">
        </li>
        <li>
        <button type="submit" name="submit">Tambah data!</button>
        </li>
    </ul>

</form>

</body>
</html>