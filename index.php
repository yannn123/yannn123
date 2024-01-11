<?php
include "header.php";
include "proses/koneksi.php";

$sql = "SELECT * FROM menu_spesial";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YannnCafe - Pengalaman Kafe Terbaik</title>
    <!-- Sertakan file CSS Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
   <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
    <style>
    </style>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        html {
            cursor: progress;
        }
        const swiper = new Swiper('.swiper', {
            speed: 400,
            spaceBetween: 100,
        });
    </script>
</head>
<body class="cursor-progres">
    <!-- Hero Section -->
    <!-- bg-center bg-cover  -->
    <header class=" h-screen relative cursor-progres">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center  bg-cover bg-center" style="background-image: url('foto/FotoIndex.jpg')">
            <div class="text-center text-black">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 text-brown">Selamat Datang di
                <span class="text-yellow-600">YannnCafe</span>    
                </h1>
                <p class="text-lg md:text-xl mb-8">Nikmati Pengalaman Cafe Terbaik dengan Kami</p>
            </div>
        </div>
    </header>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (tags head lainnya) ... -->
</head class="cursor-progres">
<body class="bg-gray-100">
    <div class="container mx-auto py-8 text-center">
        <h1 class="text-2xl font-semibold mb-4">Selamat Datang di Yannn<span class="text-yellow-600">Cafe</span></h1>

        <!-- Tampilan menarik di bagian bawah -->
        <div class="bg-white p-6 rounded-lg shadow-md cursor-progres">
            <div class="grid grid-cols-1 gap-4">
                <div class="p-4 border border-gray-300 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">Menu Spesial</h2>
                    <p class="mb-4">Temukan menu spesial kami yang lezat dan unik.</p>
                    <div class="flex flex-wrap justify-center">
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            $nama = $rows['nama_barang'];
                            $gambar_blob = $rows['gambar'];
                            $gambar = base64_encode($gambar_blob);
                        ?>
                        <div class="m-4 text-center">
                            <img src="data:image/jpeg;base64, <?= $gambar?>" alt="<?= $nama?>" class="mx-auto imgModal hover:scale-105 duration-150" style="width: 300px; height: 200px; object-fit: cover;">
                            <h3 class="text-lg font-semibold mt-2"><?= $nama ?></h3>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="transform transition-transform hover:scale-110">
  <!-- Konten elemen di sini -->
</div>

    <div class="menu-special">
            <?php
            $specials = array(
                // ... (data menu spesial)
            );

            foreach ($specials as $special) {
                echo '<div class="special-item cursor-progres">';
                echo '<img src="' . $special[2] . '" alt="' . $special[0] . '">';
                echo '<h2>' . $special[0] . '</h2>';
                echo '<p>' . $special[1] . '</p>';
                echo '<p class="price">' . $special[3] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <?php
include "footer.php";
?>
</body>
</html>