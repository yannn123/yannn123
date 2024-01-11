<?php
include "koneksi.php"; // Sesuaikan dengan nama file koneksi Anda

// Ambil data yang dikirim dari JavaScript
$data = json_decode(file_get_contents("php://input"));

$idMenu = $data->id_menu;
$idKeranjang = $data->id_keranjang;
$totalHarga = $data->total_harga;

// Lakukan operasi penyimpanan ke database (misalnya, membuat record transaksi)
// Sesuaikan dengan struktur dan kebutuhan database Anda

$sql = "INSERT INTO transaksi (id_menu, id_keranjang, total_harga) VALUES ($idMenu, $idKeranjang, $totalHarga)";

if (mysqli_query($conn, $sql)) {
    $response = ['sukses' => true];
} else {
    $response = ['sukses' => false];
}

echo json_encode($response);
?>
