<head>
    <title>Admin</title>
</head>
<?php
include "sidebar.php";
include "../proses/nonsessionkoneksi.php";
$jml1 = $conn->query("SELECT COUNT(*) as jml FROM user")->fetch_assoc()['jml'];
$jml2 = $conn->query("SELECT COUNT(*) as jml FROM transaksi where status_pembayaran = 'proses'")->fetch_assoc()['jml'];
?>

<section>
    <a href="user.php" class="mr-[100px] mt-[100px]">
        <div class="box font-bold text-2xl">
            <h3 class="my-7">USER</h3>
            <h4><?= $jml1 ?></h4>
        </div>
    </a>
    <a href="konfirmasi.php" class="mr-[100px] mt-[100px]">
        <div class="box font-bold text-2xl">
            <h3 class="my-7">Pesanan</h3>
            <h4><?= $jml2 ?></h4>
        </div>
    </a>
</section>
<style>
    section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
        margin-left: 200px;
    }

    .box {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        text-align: center;
        display: inline-block;
        width: 280px;
        height: 200px;
        box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.2);
    }

    @media screen and (max-width: 600px) {
        nav a {
            float: none;
            width: 100%;
        }

        section {
            flex-direction: column;
        }

        .box {
            width: 100%;
        }
    }
</style>