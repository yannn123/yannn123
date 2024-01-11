<?php
include '../proses/nonsessionkoneksi.php';
$id = $_GET['id'];
// print_r($id);
$sql = "DELETE FROM transaksi WHERE id_transaksi = $id";
$querry = mysqli_query($conn, $sql);
echo "<br>";
// print_r($sql);
// exit;
if ($querry) {
    header("Location: ../history.php");
}elseif (!$querry) {
   echo "maaf ada kesalahan";
}
?>