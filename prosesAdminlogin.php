<?php
    session_start();

    include "koneksi.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'"))) {
        $_SESSION["user"] = $username;
        
        header("Location: ../admin");
    } else {
        header("Location: ../admin/login");
    }
?>