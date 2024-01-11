<?php
include "header.php";
include "proses/koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$kategori = $menu == "menu" ? "minuman" : "makanan";

// Query untuk mengambil data menu makanan dari database
$sql = "SELECT *  FROM menu WHERE kategori='$kategori'";
$result = mysqli_query($conn, $sql);


// Memeriksa apakah query berhasil
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cafe</title>
    <!-- Tambahkan link ke file CSS Tailwind CSS Anda -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .shad {
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="">
    <div class="container mx-auto py-8">    
        <br>
        <h1 class="text-2xl font-semibold mb-4">Menu Cafe</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Loop melalui hasil query dan tampilkan setiap item menu
            while ($row = mysqli_fetch_assoc($result)) {
                $id_menu = $row['id_menu'];
                $nama_barang = $row['nama_barang'];
                $harga = $row['harga'];
                $deskripsi = $row['deskripsi'];
                $g = $row["gambar"];
                $gambar = base64_encode($g);
            ?>
            <div class="bg-white shadow p-4 rounded-sm border-2 shad">
                <img src="data:image/jpeg;base64, <?php echo $gambar; ?>" alt="Menu Item 1" class="w-full h-80 object-cover rounded">
                <h2 class="text-lg font-semibold mt-2"><?php echo $nama_barang ?></h2>
                <p class="text-gray-600"><?php echo $deskripsi ?></p>
                <p class="text-lg font-semibold mt-2"><?php echo "Rp." .  $harga . "" ?></p>
                <form action="proses/prosesKeranjang.php" method="get">
                    <input type="hidden" name="item_id" value="<?php echo $id_menu; ?>">
                    <label for="jumlah">Jumlah Pesanan:</label>
                    <input type="number" id="jumlah" name="jumlah" value="1" >
                    <input type="submit" class="text-blue-700 w-70 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900" value="Tambahkan ke Keranjang">
                </form>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
