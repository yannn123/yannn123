<?php
include "header.php";
include "proses/koneksi.php";
// print_r($_SESSION);
// exit;
// if (!isset($_SESSION['user'])) {
//   echo "<script type='text/javascript'>
//     alert('Mohon login terlebih dahulu!');
//     window.location='login.php';
//     </script>";
// }else {
//   
//}

if(!($_SESSION['username'])){
    echo "<script type='text/javascript'>
    alert('Mohon login terlebih dahulu!');
    window.location='login.php';
    </script>";
}else{
  $id = $_SESSION['id'];
}

if (isset($id)) { 

    $sql4 = "SELECT SUM(jumlah) AS total_jumlah FROM keranjang WHERE id_user = $id";
    $result4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $jumlah2= $row4['total_jumlah'];

    $sql = "SELECT keranjang.id_menu, menu.nama_barang, keranjang.id_keranjang, keranjang.jumlah, menu.harga FROM `keranjang` INNER JOIN menu ON keranjang.id_menu = menu.id_menu WHERE keranjang.id_user = $id ORDER BY menu.nama_barang ASC";
    $result = mysqli_query($conn, $sql);

    $total = 0;
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
</head>
<?php
    if(mysqli_num_rows($result) > 0){
?>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-4">Keranjang Cafe</h1>
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
                        
                        $jumlah = $row['jumlah'];
                        foreach ($data as $row2) {
                            if ($nama == $row2['nama_barang']) {
                                $jumlah++;
                            }
                        }
                        $subtotal = $harga * ($jumlah - 1);
                        ?>
                        <form action="proses/updateHarga.php" method="post">
                        <tr class="border-0">
                            <td class="border-0 w-96"><?= $nama?></td>

                            <td class="border-0 w-auto text-center">
                            <div class="flex justify-center items-center">
                          <form action="proses/updateHarga.php" method="post">
                            <input type="hidden" name="id" value="<?= $id_menu?>">
                            <input type="hidden" name="jumlah" value="<?= $jumlah - 1 + 1?>">
                            <button class="btn btn-outline-black" type="submit"> &plus; </button>
                            
                          </form>
                           <span> <?php 
                           if(($jumlah -1) == 0){echo "<script>alert('tidak boleh kurang dari 0')</script>";}else{echo $jumlah - 1;}?> </span>  
                            
                          <form action="proses/updateHarga.php" method="post">
                            <input type="hidden" name="id" value="<?= $id_menu?>">
                            <input type="hidden" name="jumlah" value="<?= $jumlah - 2 ?>">
                            <?php if(!($jumlah - 2) == 0){ ?>
                            <button class="btn btn-outline-black" type="submit"> &minus; </button>
                            <?php } ?>
                          </form>
                          </div>
                            </td>
                            <td class="border-0 w-96 text-right"><?= $subtotal?></td>
                            <td class="border-0 w-36">
                                <input type="hidden" name="id_menu" value="<?= $id_menu?>">
                                <a href="proses/deleteMenu.php?id_menu=<?= $id_menu?>">
                              <button class="text-red-700 w-70 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="button">Delete</button>
                              </a>
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
                <input type="hidden" name="nama" value="<?= $nama ?>">
                <input type="hidden" name="harga" value="<?= $harga ?>">
                <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
                <input type="hidden" name="id_menu" value="<?= $id_menu ?>">
                <input type="hidden" name="id_keranjang" value="<?= $id_keranjang ?>">
                  <a href="checkout.php" type="submit" name="pesan_sekarang"  class="text-blue-700 w-70 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900" id="addToCart">Pesan Sekarang</a>
              <?php
              } else {
                echo "Keranjang Anda kosong.";
              }
              ?>
      <a class="text-red-700 w-70 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" href="menu.php">Kembali</a>
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


<!-- ... (your existing HTML code) ... -->

<!-- JavaScript untuk menangani penambahan ke keranjang dan memulai transaksi -->
<!-- <script>
    // Inisialisasi array keranjang kosong
    let keranjang = [];

    // Tambahkan event listener klik pada tombol "Pesan Sekarang"
    document.getElementById("addToCart").addEventListener("click", function () {
        // Dapatkan data lain yang diperlukan (misalnya, id_menu, id_keranjang, dll.) dari input tersembunyi
        const idMenu = document.querySelector("input[name='id_menu']").value;
        const idKeranjang = document.querySelector("input[name='id_keranjang']").value;

        // Kirim data ke server menggunakan permintaan AJAX atau fetch
        fetch("proses/prosesTransaksi.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id_menu: idMenu,
                id_keranjang: idKeranjang,
                total_harga: keranjang.reduce((acc, item) => acc + item, 0),
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.sukses) {
                alert('Pesan Anda Sedang Diproses!');
                // Opsional, Anda dapat mengalihkan pengguna atau melakukan tindakan lain
                window.location.href = 'transaksi.php';
            } else {
                alert('Gagal membuat transaksi. Silakan coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    });

</script> -->
<!-- ... (your existing HTML code) ... -->

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
