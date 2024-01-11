<?php

include "koneksi.php";

$id_user = $_POST["id_user"];

$data_keranjang = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user=$id_user"));

foreach($data_keranjang as $keranjang) {
    mysqli_query($conn, "INSERT INTO detail_keranjang VALUES('".$keranjang[0]."', '".$keranjang[1]."', '".$keranjang[2]."', '".$keranjang[3]."')");
}

mysqli_query($conn, "DELETE FROM keranjang WHERE id_user=$id_user");
if (isset($_POST['history'])) {
    header("Location: ../history.php");
}else {
    header("Location: ../");
}