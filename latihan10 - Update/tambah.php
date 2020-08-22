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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Halaman Admin</title>
</head>

<body>
    <h1 class="text-center">Tambah data mahasiswa</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="Nama">Nama :</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Input Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Nrp">Nrp :</label>
                        <input type="text" class="form-control" id="Nrp" name="Nrp" placeholder="Input Nrp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Input email" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan :</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Input jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar :</label>
                        <input type="text" class="form-control" id="gambar" name="gambar" placeholder="Input gambar" required>
                    </div>
                    <li>
                        <button type="submit" name="submit">Tambah data!</button>
                    </li>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="JavaScript/jquery-3.5.1.min.js"></script>
    <script src="JavaScript/popper.min.js"></script>
    <script src="JavaScript/bootstrap.min.js"></script>
</body>

</html>