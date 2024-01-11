<?php
include "./proses/koneksi.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Mohon login terlebih dahulu');window.location.href = './login.php'</script>";
}
$iduser = $_SESSION['id'];
$sql = "SELECT * FROM transaksi WHERE id_user = $iduser";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($query);
// print_r($data);
// exit;
function getNamaMenu($id){
    include "proses/nonsessionkoneksi.php";
    
    $query = mysqli_query($conn, "SELECT nama_barang FROM menu WHERE id_menu = $id");
    return mysqli_fetch_assoc($query)['nama_barang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Yannn cafe</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
<?php include "header.php";?>
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Transaction History</h1>

        <!-- List of transactions -->
        <div class="mb-6">
        <table class="w-full border-collapse">
    <thead>
        <tr>
            <th class="border border-gray-300 py-2 px-4">Date</th>
            <th class="border border-gray-300 py-2 px-4">nama barang</th>
            <th class="border border-gray-300 py-2 px-4">jumlah</th>
            <th class="border border-gray-300 py-2 px-4">Total Amount</th>
            <th class="border border-gray-300 py-2 px-4">Status</th>
            <th class="border border-gray-300 py-2 px-4">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $transaction): ?>
            <?php
            $items = json_decode($transaction[7], true);
            $count = count($items);
            ?>
            <?php for ($i = 0; $i < $count; $i++): ?>
                <tr>
                    <?php if ($i === 0): ?>
                        <td rowspan="<?php echo $count; ?>" class="border border-gray-300 py-2 px-4">
                            <?php echo $transaction[2]; ?>
                        </td>
                    <?php endif; ?>
                    <td class="border border-gray-300 py-2 px-4">
                        <?php echo getNamaMenu($items[$i][0]); ?>
                    </td>
                    <td class="border border-gray-300 py-2 px-4">
                        <?php echo $items[$i][1]; ?>
                    </td>
                    <?php if ($i === 0): ?>
                        <td rowspan="<?php echo $count; ?>" class="border border-gray-300 py-2 px-4">
                            <?php echo "Rp." . number_format($transaction[3]); ?>
                        </td>
                        <td rowspan="<?php echo $count; ?>" class="border border-gray-300 py-2 px-4">
                            <?php echo $transaction[5]; ?>
                        </td>
                        <td rowspan="<?php echo $count; ?>" class="border border-gray-300 py-2 px-4">
                            <button type="button" style="color: red;" onclick="del()">Cancel Pesanan</button>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endfor; ?>
        <?php endforeach; ?>
        <script>
            function del() {
                var konfirmasi = confirm("Apakah anda yakin ingin mengcancel Pesanan?")
                if (konfirmasi) {
                    window.location.href = './proses/deleteHistory.php?id=<?= $transaction[0] ?>'
                }
            }
        </script>
    </tbody>
</table>




        </div>

        <!-- Back button -->
        <div>
            <a href="./" class="text-blue-500 hover:underline">Back</a>
        </div>
    </div>
</body>

</html>
