<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_menu'])) {
    $id_menu = $_GET['id_menu'];

    function deleteMenu($id_menu)
    {
        global $conn;

        // Pilih semua data dari tabel keranjang
        $stmt2 = $conn->prepare("SELECT * FROM keranjang");
        $stmt2->execute();

        // Dapatkan hasil dari objek $stmt2
        $result = $stmt2->get_result();

        // Periksa jumlah baris pada tabel keranjang
        if ($result->num_rows > 0) {
            // Hapus menu dari keranjang
            $stmt = $conn->prepare("DELETE FROM keranjang WHERE id_menu = ?");
            $stmt->bind_param("i", $id_menu);

            if ($stmt->execute()) {
                echo "<script>alert('Menu berhasil dihapus dari keranjang');
                      window.location.href = '../keranjang.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus menu dari keranjang');
                      window.location.href = '../keranjang.php';</script>";
            }
        } else {
            // Tidak ada pesanan
            echo "<script>alert('Tidak ada pesanan');
                  window.location.href = '../menu';</script>";
        }
    }

    deleteMenu($id_menu);
} else {
    echo 'Invalid request method or missing id_menu parameter.';
}
?>
