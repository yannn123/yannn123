<?php

include "../../proses/nonsessionkoneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);
$row = mysqli_fetch_assoc($result);


if (mysqli_num_rows($result) > 0) {
    // Login berhasil, simpan nama pengguna ke dalam sesi
    $id = $row['id_user'];
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    header("Location: ../dashboard.php"); // Redirect ke halaman index.php setelah login berhasil
    exit;
} else {
    // Login gagal, tampilkan pesan kesalahan
    mysqli_error($conn);
    header("Location: ../login.php?error");
}
?>