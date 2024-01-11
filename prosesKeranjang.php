<?php
require "koneksi.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if (isset($_GET['item_id'])) {
        $item_id = $_GET['item_id'];
        $jumlah2 = $_GET["jumlah"];
        $id = $_SESSION['id'];
        $sql2 = "INSERT INTO keranjang (id_keranjang, id_menu, id_user, jumlah) VALUES ('', '$item_id', '$id', '$jumlah2')";
        
        for ($i=0; $i < $jumlah2; $i++) { 
            $result2 = mysqli_query($conn, $sql2);
        }
        
        header("Location: ../keranjang.php");
    } else {
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
} else {
    echo '<script>alert("Mohon login terlebih dahulu");
          window.location.href = "../login.php";</script>';
}
?>
