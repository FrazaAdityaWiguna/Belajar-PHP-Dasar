<?php 
    // koneksi ke Database
    // parameternya localhost, akun username, password, nama database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        }
        return $rows;
    }

function tambah ($data) {
    global $conn;
        // ambil data dari tiap elemen dalam form
        // htmlspecialchars agar aman
        $nama = htmlspecialchars($data["Nama"]);
        $nrp = htmlspecialchars($data["Nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
        
    // query insert data
    $query = " INSERT INTO mahasiswa
    VALUES
    ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
        // ambil data dari tiap elemen dalam form
        // htmlspecialchars agar aman
        $id = $data["id"];
        $nama = htmlspecialchars($data["Nama"]);
        $nrp = htmlspecialchars($data["Nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
        
    // query insert data
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}






?>