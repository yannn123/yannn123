<?php
// print_r($_POST);
include "../proses/koneksi.php";

$idUser = $_SESSION['id'];
$tanggal = date("y-m-d H:i:s");
$total = $_POST['total'];
$metode = $_POST['payment'];   
$status = $_POST['status'];
$alamat = $_POST['address'];

$menuSql = "SELECT * FROM keranjang WHERE id_user = $idUser";
$menuResult = mysqli_query($conn, $menuSql);
$menuFetched = mysqli_fetch_all($menuResult);
$menu = array();
foreach ($menuFetched as $array) {
    $menu[] = array($array[1], $array[3]);
}
$jsonMenu = json_encode($menu);

$sql = "INSERT INTO transaksi VALUES(0, '$idUser', '$tanggal', '$total', '$metode', '$status', '$alamat', '$jsonMenu')";

$result = mysqli_query($conn, $sql);

// $deleteSql = "DELETE FROM keranjang WHERE id_user = $idUser";
// mysqli_query($conn, $deleteSql);

header("Location: ../struk.php")
?>