<?php
include "header.php";
include "proses/koneksi.php";

if (isset($_SESSION)) {
  $id = $_SESSION['id'];
}elseif(!($_SESSION['username'])){
    echo "<script type='text/javascript'>
    alert('Mohon login terlebih dahulu!');
    window.location='login.php';
    </script>";
}

if (isset($id)) { 

    $sql4 = "SELECT SUM(jumlah) AS total_jumlah FROM keranjang WHERE id_user = $id";
    $result4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $jumlah2= $row4['total_jumlah'];

    // Query database untuk mendapatkan data menu berdasarkan item_id
    $sql = "SELECT menu.id_menu, menu.nama_barang, keranjang.id_keranjang, keranjang.jumlah, menu.harga FROM `keranjang` INNER JOIN menu ON keranjang.id_menu = menu.id_menu WHERE keranjang.id_user = $id ORDER BY menu.nama_barang ASC;";
    $result = mysqli_query($conn, $sql);

    $total = 0;




    // if ($result) {
    //     $row = mysqli_fetch_assoc($result);

    //     $nama = $row["nama_menu"];
    //     $harga = $row['harga_menu'];


        // Tambahkan item ke keranjang (di sesi)
        // $item = array(
        //     'item_id' => $row['id_menu'],
        //     'item_name' => $row['nama_menu'],
        //     'item_price' => $row['harga_menu'],
        // );
        // $keranjang[] = $item;

        // Simpan kembali keranjang yang telah diperbarui ke sesi
        // $_SESSION['keranjang'] = $keranjang;

        // Selanjutnya, Anda juga harus menyimpan item ke database
        // Contoh: INSERT INTO keranjang (item_id, item_name, item_price) VALUES ($item['item_id'], '$item['item_name']', $item['item_price']);
    // }
}

?>
<br>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Cafe</title>
    <!-- Tambahkan link ke file CSS Tailwind CSS Anda -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</head>
<?php
    if(mysqli_num_rows($result) > 0){
?>
<body class="bg-gray-100">
    <div class="w-96 mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-4">Struk Pembayaran</h1>
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-medium">Pesanan sedang di proses</span> Mohon screenshot halaman ini agar struk tidak hilang!.
          </div>
        </div>
        <div class="bg-white rounded shadow p-4">
            <?php
            if (!empty($result)) {
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }

                $oldName = null;
                $total = 0;
                ?>
                <table class="border-0">
                <?php
                foreach ($data as $row) {
                    $nama = $row["nama_barang"];
                    $harga = $row['harga'];
                    $id_menu = $row['id_menu'];
                    $id_keranjang = $row['id_keranjang'];

                    if ($nama != $oldName) {
                        // echo "<div class='flex items-center justify-between mb-4'>";
                        // echo "<h2 class='text-lg font-semibold'>" . $nama . "</h2>";
                        
                        $jumlah = 0;
                        foreach ($data as $row2) {
                            if ($nama == $row2['nama_barang']) {
                                $jumlah++;
                            }
                        }
                        $jumlah = $row['jumlah'];
                        $subtotal = $harga * $jumlah;
                        ?>
                        <form action="proses/deleteMenu.php" method="post">
                        <tr class="border-0">
                            <td class="border-0 w-96"><?= $nama?></td>
                            <td class="border-0 w-auto text-center">x<?= $jumlah?></td>
                            <td class="border-0 w-96 text-right"><?= $subtotal?></td>
                            <td class="border-0 w-36">
                                <input type="hidden" name="id_menu" value="<?= $id_menu?>">
                            </td>
                        </tr>
                        </form>
                        <?php

                        // echo "<p class='text-lg font-semibold'>" . $jumlah . "</p>";
                        // echo "<p class='text-lg font-semibold'>" . "Rp. " . $subtotal . "</p>";
                        // echo "</div>";
                        $total += $subtotal;
                    }
                    
                    $oldName = $nama;
                }
                ?>
                </table>

                <hr class="my-4 border-t-2 border-gray-200">
                <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Total</h2>
                <p class="text-lg font-semibold" id="total-price">Rp. <?= $total ?></p>
                </div>
              <?php
              } else {
                echo "Keranjang Anda kosong.";
              }
              ?>
            <style>
                 /* echo '<a href="transaksi.php" type="submit" name="pesan_sekarang" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" id="addToCart">Pesan Sekarang</a>'; */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .edit-btn, .delete-btn {
      padding: 6px 10px;
      margin: 2px;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #4caf50;
      color: white;
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
    }
  </style>
            <tr>
        <td></td>
        <td></td>
        <td>
          
        </td>            
        </div>
    </div>
    <form action="proses/hapusKeranjang.php" method="POST" class="flex justify-center items-center">
      <input type="hidden" name="id_user" value="<?= $id ?>">
      <button class="text-red-700 w-96 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Kembali</button>
    </form>
    <div class="flex justify-center items-center">
    <form action="proses/hapusKeranjang.php" method="POST">
    <input type="hidden" name="id_user" value="<?= $id ?>">
    <input type="hidden" name="history" value="true">
    <button class="text-red-700 w-96 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">history</button>
    </form>
    </div>

    <script>
          function goBack() {
        // Kembali ke halaman sebelumnya
        window.history.back();
    }
    function editRow(id) {
      // Implement edit functionality here, e.g., show a form to edit the row
      console.log('Edit row with ID:', id);
    }

    function deleteRow(id) {
      // Implement delete functionality here, e.g., remove the row from the table
      console.log('Delete row with ID:', id);
    }
  </script>
        </div>
    </div>
</body>
<?php
     }else{
         echo "<script>alert('Tidak ada pesanan dikeranjang');
               window.location.href = 'menu.php?menu=menu';</script>";
     }
?>
</html>
