<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<br>
<br>

    <style>
    body {
        background-color: #f5f5f5; /* Ganti dengan warna latar belakang yang sesuai */
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
    }

    .custom-heading {
        font-size: 36px;
        color: #333; /* Ganti dengan warna teks yang sesuai */
        font-family: 'Arial', sans-serif; /* Ganti dengan jenis huruf yang sesuai */
    }

    .custom-paragraph {
        font-size: 16px;
        color: #666; /* Ganti dengan warna teks yang sesuai */
    }

    .custom-profile-image {
        background-color: #f0f0f0; /* Ganti dengan warna latar belakang yang sesuai */
    }
</style>

</head>
<br>
<br>
<br>
<br>
<body class="bg-gray-100">
    <div class="container mx-auto mt-4 p-4 bg-white rounded-lg shadow-lg">
        <div class="text-center">
            <img src="walpaper1.jpg" alt="Foto Profil" class="rounded-full h-24 w-24 mx-auto mb-4 custom-profile-image">
            <h1 class="text-2xl font-bold custom-heading">Brian Adinta Lovy</h1>
            <p class="text-gray-600">Pelajar</p>
        </div>
        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-2">Tentang Saya</h2>
            <p class="text-gray-700 custom-paragraph">Saya adalah siswa dari SMK PGRI 3 ,Malang <br>
        Saya siswa kelas 11 RPA</p>
        </div>
        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-2">Kontak</h2>
            <p class="text-gray-700 custom-paragraph">Email: balbrian15@gmail.com</p>
        </div>
    </div>
</body>
</html>
