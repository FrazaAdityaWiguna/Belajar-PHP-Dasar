<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa
            WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%'OR
        jurusan LIKE '%$keyword%'
";
$mahasiswa = query($query);
?>
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