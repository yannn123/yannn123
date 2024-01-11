<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Konfirmasi Transaksi</title>
    <?php include "sidebar.php"?>
</head>
<body class="bg-gray-200 p-4">

    <div class="max-w-2xl mx-auto p-6 rounded-md">
        <h1 class="text-2xl font-bold mb-4">Konfirmasi Transaksi</h1>

        <table class="min-w-full border rounded-lg overflow-hidden">
        <thead>
    <tr>
        <th class="border-y-2 border-black py-2 px-4">ID Transaksi</th>
        <th class="border-y-2 border-black py-2 px-4">ID User</th>
        <th class="border-y-2 border-black py-2 px-4">Tanggal Transaksi</th>
        <th class="border-y-2 border-black py-2 px-4">Total Pembayaran</th>
        <th class="border-y-2 border-black py-2 px-4">Metode Pembayaran</th>
        <th class="border-y-2 border-black py-2 px-4">Status Pembayaran</th>
        <th class="border-y-2 border-black py-2 px-4">Alamat Pengiriman</th>
        <th class="border-y-2 border-black py-2 px-4">Menu</th>
        <th class="border-y-2 border-black py-2 px-4">jumlah</th>
        <th class="border-y-2 border-black py-2 px-4">Action</th>
    </tr>
</thead>
<tbody>
    <?php
    function getNamaMenu($id){
        include "../proses/nonsessionkoneksi.php";
        
        $query = mysqli_query($conn, "SELECT nama_barang FROM menu WHERE id_menu = $id");
        return mysqli_fetch_assoc($query)['nama_barang'];
    }
    // Include file koneksi
    include "../proses/nonsessionkoneksi.php";

    // Query untuk mendapatkan data dari tabel transaksi
    $query = "SELECT * FROM transaksi";
    $result = mysqli_query($conn, $query);

    // Loop untuk menampilkan data dalam tabel
    foreach ($result as $row) {
        $items = json_decode($row['menu'], true);
        $count = count($items);

        for ($i = 0; $i < $count; $i++) {
            echo "<tr>";

            echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['id_transaksi'] . "</td>";
            if ($i === 0) {
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['id_user'] . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['tanggal_transaksi'] . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . "RP.".number_format($row['total_pembayaran']) . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['metode_pembayaran'] . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['status_pembayaran'] . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'>" . $row['alamat_pengiriman'] . "</td>";

            }            echo "<td class='border-y-2 border-black py-2 px-4'>" . getNamaMenu($items[$i][0]) . "</td>";

            echo "<td class='border-y-2 border-black py-2 px-4'>" . $items[$i][1] . "</td>";

            if ($i === 0) {
                // echo "<td rowspan='$count' class='border border-gray-300 py-2 px-4'>" . "Rp." . number_format($row['total_pembayaran']) . "</td>";
                // echo "<td rowspan='$count' class='border border-gray-300 py-2 px-4'>" . $row['status_pembayaran'] . "</td>";
                echo "<td rowspan='$count' class='border-y-2 border-black py-2 px-4'><button type='button' style='color: blue;' onclick='del()'>Konfirmasi Pesanan</button></td>";
            }

            echo "</tr>";
        }
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</tbody>
</table>

<script>
    function del() {
        var konfirmasi = confirm("Apakah anda yakin ingin mengkonfirmasi Pesanan?")
        if (konfirmasi) {
            window.location.href = './proses/proses_konfirmasi.php?id=<?= $row['id_transaksi'] ?>';
        }
    }
</script>
    </div>

</body>
</html>
