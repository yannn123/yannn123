<?php
include "proses/koneksi.php";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>YannnCafe</title>
    <style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        padding: 20px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        padding: 7px; /* Tambahkan padding di sini */
        display: block;
        text-decoration: none;
        color: #000;
    }

    /* CSS untuk header tetap (sticky) */
    .header {
        /* background: rgba(255, 255, 255, 0.8);  */
        background : yellow;
        color: black; /* Warna teks header */
        padding: 22px 0;
        position: fixed; /* Membuat header tetap */
        top: 0; /* Menempatkan header di bagian atas */
        width: 100%; /* Header akan mengambil lebar penuh */
        z-index: 1000; /* Menentukan lapisan tampilan header di atas elemen lain */        
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-top: 0px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        font-weight: bold;
    }
    /* CSS untuk konten halaman */
    .content {
        padding: 20px;
    }
</style>
</head>
<body>
    <header class="header">
        <div class="container mx-auto flex items-center">    
            <div>
                <h1 class="text-5xl font-bold text-gray">Yannn<span class="text-yellow-600">Cafe</span> 
                </h1> 
            </div>
            <nav class="mx-auto">
                <ul class="flex space-x-4 text-2xl">
                    <li><a href="index.php" class="text-gray hover:text-yellow-600" >Home</a></li>
                    <li><a href="profil.php" class="text-gray hover:text-yellow-600">Profil</a></li>
                    <li class="dropdown">
                        <a href="#" class="text-gray hover:text-yellow-600">Menu</a>
                        <div class="dropdown-content hover:text-yellow-600">
                            <a href="menu.php?menu=menu" class="hover:text-yellow-600">Menu Minuman</a>
                            <a href="menu.php?menu=menu2" class="hover:text-yellow-600">Menu Makanan</a>
                        </div>
                    </li>
                    <li><a href="keranjang.php" class="text-gray hover:text-yellow-600">Keranjang</a></li>
                    <li><a href="history.php" class="text-gray hover:text-yellow-600">History</a></li>
                    
                    <li class="dropdown">
                        <a href="#" class="text-gray hover:text-yellow-600">Setting</a>
                        <div class="dropdown-content">
                            <?php if (!isset($_SESSION['id'])): ?>
                            <a href="login.php" class="hover:text-yellow-600">Login</a>
                            <a href="register.php" class="hover:text-yellow-600"> Register</a>
                            <?php else : ?>
                            <a href="proses/logout.php" class="hover:text-yellow-600">Logout</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- <div class="content">   -->
        <!-- Konten halaman di sini -->
    <!-- </div> -->
</body>
</html>
