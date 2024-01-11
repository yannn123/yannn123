<?php
    include "../proses/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pesan_sekarang'])) {
   $id_barang = $_POST['id_menu'];
   $nama = $_POST['nama'];
   $jumlah = $_POST['jumlah'];
   $harga = $_POST['harga'];
   $id_keranjang = $_POST['id_keranjang'];

   print_r($id_barang);

   $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

   if (!$koneksi) {
      die("Koneksi gagal: " . mysqli_connect_error());
   }

   $query_insert_detail = "INSERT INTO detail_keranjang (id_barang) VALUES ('$id_barang')";
   mysqli_query($koneksi, $query_insert_detail);

   $query_hapus_keranjang = "DELETE FROM keranjang WHERE id_barang = '$id_barang'";
   mysqli_query($koneksi, $query_hapus_keranjang);

   mysqli_close($koneksi);

   header("Location: halaman_admin.php");
} else {
   echo "Akses tidak sah!";
}
?>

?>