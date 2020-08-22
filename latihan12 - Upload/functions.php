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

        // upload gambar
        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }
        
    // query insert data
    $query = " INSERT INTO mahasiswa
    VALUES
    ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
   $namaFile = $_FILES['gambar']['name'];
   $sizeFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   // cek apakah tidak ada gambar yang diupload
   if ( $error === 4 ) {
       echo "<script>
                alert('Choose Img!');
            </script>";
        return false;
   }

      // cek apakah yang diupload adalah gambar
      $extensiGambarValid = ['jpg', 'jpeg', 'png'];
      // membagi 2 str (.)
      $ekstensiGambar = explode('.', $namaFile);
      // merubah tulisan jadi kecil
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if ( !in_array($ekstensiGambar, $extensiGambarValid) ) {
       echo "<script>
               alert('Yang anda upload bukan gambar!');
           </script>";
       return false;
      }

   // cek jika sizenya terlalu besar
   if( $sizeFile > 1000000 ) {
    echo "<script>
            alert('Size img Terlalu besar');
        </script>";
    return false;
   }

   // lolos pengecekan gambar siap diupload
   // generate nama gambar baru
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;

   move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

   return $namaFileBaru;
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
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // cek apakah user klik gambar baru atau tidak
        if( $_FILES['gambar'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
        
        
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

function search($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
                    nama LIKE '%$keyword%' OR
                    nrp LIKE '%$keyword%' OR
                    email LIKE '%$keyword%'OR
                    jurusan LIKE '%$keyword%'
            ";
            return query($query);
}





?>