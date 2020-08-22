<?php 
    // require atau include
    require 'functions.php';
    // query menentukan hasil dari table
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // tombol search ditekan
    if ( isset($_POST["search"]) ) {
        $mahasiswa = search($_POST["keyword"]);
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
    <h1 class="text-center">Daftar Mahasiswa</h1>
    <div class="container">
        <div class="row">


            <div class="col-12">
                <a href="tambah.php" class="d-flex justify-content-center bg-light mb-2">Tambah data mahasiswa</a>
            </div>


            <div class="col-12 mb-2">
            <form action=""method="POST" class="d-flex justify-content-center">
            <input type="text" name="keyword" size="50" autofocus="" placeholder="Input Keyword" autocomplete="off" class="mr-1">
            <button type="submit" name="search"  class="btn-primary">Search</button>
            </form>
            </div>


            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>    
                    <?php foreach( $mahasiswa as $row) : ?>
                    <tbody>
                        <tr>
                            <td>
                            <?= $i; ?>
                            </td>
                            <td>
                                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')" ;>hapus</a>
                            </td>
                            <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                            <td>
                                <?= $row["Nrp"]; ?>
                            </td>
                            <td>
                                <?= $row["Nama"]; ?>
                            </td>
                            <td>
                                <?= $row["email"]; ?>
                            </td>
                            <td>
                                <?= $row["jurusan"]; ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
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