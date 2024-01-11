<?php
include "../../proses/nonsessionkoneksi.php";
// print_r($_GET);
// exit;
$id = $_GET['id'];

$sql = "UPDATE transaksi SET status_pembayaran = 'Selesai' WHERE id_transaksi = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../konfirmasi.php");
}else {
    echo "maaf terjadi kesalahan";
}
?>