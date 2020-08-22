<?php 
    session_start();

    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    
require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan data id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {


    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
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

    <title>Ubah data mahasiswa</title>
</head>

<body>
    <h1 class="text-center">Ubah data mahasiswa</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
                    <div class="form-group">
                        <label for="Nama">Nama :</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Input Name" value="<?= $mhs["Nama"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Nrp">Nrp :</label>
                        <input type="text" class="form-control" id="Nrp" name="Nrp" placeholder="Input Nrp" value="<?= $mhs["Nrp"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Input email" value="<?= $mhs["email"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan :</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Input jurusan" value="<?= $mhs["jurusan"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar :</label>
                        <img src="img/<?= $mhs['gambar']; ?>" alt="gambar" class="mb-2" width="100">
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Input gambar">
                    </div>
                    <div>
                        <button type="submit" name="submit" class="bg-primary text-white">Ubah data!</button>
                    </div>
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