<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="menu-special">
        <?php
        $specials = array(
            array("Macchiato", "Pada awalnya Macchiato merupakan minuman sejenis kopi yaitu espresso yang ditambahkan dengan sedikit susu.
            Sesuai dengan namanya yang berasal dari Italia yang berarti bercak / noda, fungsi susu yang ditambahkan hanyalah sebagai pemberi tampilan terpisah antara warna kopi & susu dalam segelas minuman.
            pada umumnya Macchiato memang lebih sering diaplikasikan pada minuman kopi, tetapi pada jaman modern seperti sekarang ini, Macchiato pun dapat diterapkan pada teh & minuman lainnya.", "macchiato.jpg", "Rp.12.000"),
            array("Milk Tea", "Salah satu jenis minuman teh yang populer belakangan ini, terutama jenis Milk Tea asal Taiwan yang seringkali menggunakan bubble (tapioca pearl) sebagai topping (bahan pelengkap)nya.
            Milk Tea yaitu teh yang dicampur dengan susu. Susu bisa berupa susu segar rendah lemak (low fat) ataupun menggunakan krimer nabati sebagai pengganti susu. Untuk variasi tehnya biasa menggunakan daun teh asal Taiwan seperti jenis Assam Black, Green, Earl Grey, hingga Roasted Oolong Tea.", "milktea.jpg", "Rp.8000"),
            array("Ice Blend", "Jenis minuman yang sangat digemari, terutama kalangan remaja dan anak muda. Minuman ini terbentuk dari: es batu yang dihancurkan hingga halus, biasanya menggunakan mesin blender, dan dicampurkan dengan kopi, perasa minuman (flavor powder) atau sirup beraroma, sehingga menciptakan rasa minuman yang nikmat dan memberi sensasi dingin.
            Minuman Ice Blend seringkali diberi tambahan topping whip cream untuk menambah citarasa dan keindahan dalam penyajiannya.", "iceblend.jpg", "Rp.15.000")
        );

        foreach ($specials as $special) {
            echo '<div class="special-item">';
            echo '<img src="' . $special[2] . '" alt="' . $special[0] . '">';
            echo '<h2>' . $special[0] . '</h2>';
            echo '<p>' . $special[1] . '</p>';
            echo '<p class="price">' . $special[3] . '</p>';
            echo '</div>';
        }
        ?>
        <br>
        <br>
        <button class="mt-4 bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700"><a href="index.php">Kembali</a> </button>
    </div>
</body>
</html>
