<?php
require "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "INSERT INTO user (username, password) VALUES ('$username','$password')";

if (mysqli_query($conn, $query_sql)) {
    echo "<script type='text/javascript'>
                    window.location='../login.php';
                </script>";
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);

}
?>