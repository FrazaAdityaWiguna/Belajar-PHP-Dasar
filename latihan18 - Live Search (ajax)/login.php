<?php 
session_start();
require 'functions.php';

// Cek Cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
    
}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username apakah sama dengan yang ada di database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // Set Session
            $_SESSION["login"] = true;

            // Cek Remember me
            if( isset($_POST['remember']) ) {
                // Buat Cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }

    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Halaman Login</title>
</head>
<body>
    <h1 class="text-center">Halaman Login</h1>
 <?php if( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">Username / Password salah!</p>
 <?php endif; ?>
 <div class="container">
 <div class="row">
 <div class="col">
 <form action="" method="POST">
    <div class="form-group">
        <label for="username">Email address</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember">
    <label class="form-check-label" for="remember">Remember Me</label>
  </div>
        <button type="submit" name="login" class="btn-primary">Sign in</button>
   
    </form>

 </div>
 </div>
 </div>
    
</body>
</html>