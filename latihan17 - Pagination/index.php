<?php 
    session_start();

    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    // require atau include
    require 'functions.php';

    // pagination
    // konfigurasi
    $jumlahDataPerhalaman = 3;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    // Cara membulatkan angka pecahan around, floor, ceil
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    // Operator ternary
    $halamanAktif = ( isset($_GET["p"]) ) ? $_GET["p"] : 1;
    $awalData = ($jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
    

    // query menentukan hasil dari table
    // LIMIT (INDEX KE-, Baris)
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

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

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="logout.php" class="btn btn-primary" role="button" aria-pressed="true">Logout</a>
            </div>
        </div>
    </div>
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
    <div class="container">
        <div class="row">
            <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php if( $halamanAktif > 1) : ?>
                <li class="page-item"><a class="page-link" href="?p=<?= $halamanAktif - 1; ?>">Previuous</a></li>
                <?php endif; ?>

            <?php for( $i = 1; $i <=$jumlahHalaman; $i++) : ?>
                <?php if( $i == $halamanAktif) : ?>
                        <li class="page-item"><a class="page-link bg-light" href="?p=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                         <li class="page-item"><a class="page-link" href="?p=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $halamanAktif < 1) : ?>
                <li class="page-item"><a class="page-link" href="?p=<?= $halamanAktif + 1; ?>">Next</a></li>
            <?php endif; ?>
                </ul>
            </nav>
            </div>
        </div>
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