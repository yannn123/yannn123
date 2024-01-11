<?php
include "./koneksi.php";

$id = $_POST['id'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE keranjang SET jumlah = $jumlah WHERE id_menu = $id";

$result = mysqli_query($conn, $sql);
header("Location: ../Keranjang.php");

?>