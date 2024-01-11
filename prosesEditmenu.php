<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_keranjang = $_POST['id_keranjang'];
    $action = $_POST['action'];

    // Mendapatkan jumlah saat ini
    $sql_get_jumlah = "SELECT jumlah FROM keranjang WHERE id_keranjang = $id_keranjang";
    $result_get_jumlah = mysqli_query($conn, $sql_get_jumlah);

    if ($result_get_jumlah) {
        $row = mysqli_fetch_assoc($result_get_jumlah);
        $jumlah_sekarang = $row['jumlah'];

        // Melakukan penambahan atau pengurangan sesuai action
        if ($action == 'tambah') {
            $jumlah_baru = $jumlah_sekarang + 1;
        } elseif ($action == 'kurangi' && $jumlah_sekarang > 1) {
            $jumlah_baru = $jumlah_sekarang - 1;
        } elseif ($action == 'delete') {
            // Hapus item dari keranjang jika action adalah delete
            $sql_delete = "DELETE FROM keranjang WHERE id_keranjang = $id_keranjang";
            $result_delete = mysqli_query($conn, $sql_delete);

            if ($result_delete) {
                header("Location: ../keranjang.php");
                exit();
            } else {
                echo 'Error deleting item from cart.';
                exit();
            }
        } else {
            // Tidak melakukan perubahan jika action tidak valid atau jumlah kurang dari 1
            echo 'Invalid action or quantity.';
            exit();
        }

        // Mengupdate jumlah di database
        $sql_update_jumlah = "UPDATE keranjang SET jumlah = $jumlah_baru WHERE id_keranjang = $id_keranjang";
        $result_update_jumlah = mysqli_query($conn, $sql_update_jumlah);

        if ($result_update_jumlah) {
            header("Location: ../keranjang.php");
            exit();
        } else {
            echo 'Error updating quantity.';
            exit();
        }
    } else {
        echo 'Error retrieving current quantity.';
        exit();
    }
} else {
    echo 'Invalid request method.';
    exit();
}
?>
