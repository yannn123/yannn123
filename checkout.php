<?php
// session_start();
include "proses/koneksi.php";

// print_r($_SESSION);
// exit;
if (isset($_SESSION)) {
    $id = $_SESSION['id'];
  }elseif(!($_SESSION['username'])){
      echo "<script type='text/javascript'>
      alert('Mohon login terlebih dahulu!');
      window.location='login.php';
      </script>";
  }

  $data = $conn->query("SELECT * FROM keranjang WHERE id_user = $id")->fetch_all();
//   print_r($data);
//   exit;
//   print_r($keranjang);
//   $MenuInKeranjang = $keranjang[0][1];
//   $menu = $conn->query("SELECT * FROM menu WHERE id_menu = $MenuInKeranjang")->fetch_all();
//   echo "<br>";
//   print_r($menu);
//   exit;

function getNamaMenu($id){
    include "proses/nonsessionkoneksi.php";
    
    $query = mysqli_query($conn, "SELECT nama_barang FROM menu WHERE id_menu = $id");
    return mysqli_fetch_assoc($query)['nama_barang'];
}
function getHargaMenu($id){
    include "proses/nonsessionkoneksi.php";
    
    $query = mysqli_query($conn, "SELECT harga FROM menu WHERE id_menu = $id");
    return mysqli_fetch_assoc($query)['harga'];
}

function multiplyArrays($array1, $array2) {
    $result = 0;
    if (count($array1) !== count($array2)) {
        return "error!, harga dan jumlah tidak sama";
    }

    for ($i = 0; $i < count($array1); $i++) {
        $result += $array1[$i] * $array2[$i];
    }

    return $result;
}

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Yann cafe</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <?php include 'header.php';?>
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Checkout</h1>

        <!-- List -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Purchased Items</h2>
            <ul>
                
                <?php 
            
                foreach ($data as $row) {
         
                $jumlah[] = $row[3];
                $harga[] = getHargaMenu($row[1]);
                $hargaMenu = getHargaMenu($row[1]);
   
                    ?>
               
                <li class="flex justify-between items-center py-1">
                    <span><?= getNamaMenu($row[1]) ?></span>
                    <span>Quantity: <?= $row[3] ?> x <?= "Rp.".number_format($hargaMenu) ?></span>
                </li>
                <?php }
                    
                    $total = multiplyArrays($jumlah, $harga);  
                ?>
                
            </ul>
        </div>

        <!-- Total  -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Total </h2>
           
            <p class="text-xl font-semibold">Total: Rp.<?= number_format($total) ?></p>
        </div>

        <!-- Payment -->
        <form class="mb-6" method="POST" action="proses/prosesCheckout.php">
            <h2 class="text-lg font-semibold mb-2">Metode Pembayaran</h2>
            <label for="payment" class="block mb-2">Pilih Metode Pembayaran:</label>
            <select id="payment" name="payment" class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="gopay">Gopay</option>
                <option value="ovo">OVO</option>
                
            </select>
        

     
       
            <h2 class="text-lg font-semibold mb-2">Informasi kontak</h2>
            <label for="phone" class="block mb-2">Nomor HP:</label>
            <input type="number" id="phone" name="phone" class="w-full border border-gray-300 rounded px-3 py-2 mb-3" required>

            <label for="address" class="block mb-2">Alamat:</label>
            <textarea id="address" name="address" rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 mb-3" required></textarea>
       
            <h2 class="text-lg font-semibold mb-2">User Information</h2>
            <label for="username" class="block mb-2">Username: <?= $_SESSION['username'] ?></label>
            
        

     
        <div class="mt-8">
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Pesan Sekarang
            </button>
            <input type="hidden" name="total" value="<?= $total?>">
            <input type="hidden" name="status" value="Proses">
            </form>
            <a href="Keranjang.php">
            <button type="button" class="bg-red-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                kembali ke keranjang
            </button>
            </a>
        </div>
    </div>
</body>

</html>
