<?php

    $server = "localhost";
    $database = "db_cafe";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($server, $user, $password, $database);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }else{
        echo "";
    }
    return $conn;
    ?>