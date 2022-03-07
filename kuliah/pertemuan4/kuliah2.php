<?php
// definisikan masing masing kubus
$a = 9;
$b = 4;

// hitung masing-masing volume kubus
$volume_a = pow($a, 3);
$volume_b = pow($b, 3);

// hitung total 2 volume
$total = $volume_a + $volume_b;

// kembalikan nilai total
echo "jumlah dari volume kubus A dengan sisi $a dan kubus B dengan sisi $b adalah $total";


echo "<hr>";

// Deklarasi / definisi function
function totalVolumeDuaKubus($a, $b) {
    return "jumlah dari volume kubus  dengan sisi $a dan kubus  dengan sisi $b adalah" .    pow($a, 3) + pow($b, 3);
};

// pemanggilan / eksekusi function
echo totalVolumeDuaKubus(9, 4);
echo "<br>";
echo totalVolumeDuaKubus(10, 20);
echo "<br>";
echo totalVolumeDuaKubus(5, 6);


// buat sebuah fungsi untuk menghitung luas segi tiga
echo "<br>";
function luasSegiTiga($a, $t) {
    $luas = 0.5 * $a * $t;
    return "Luas segi tiga dengan alas $a dan tinggi $t adalah $luas";
}

echo luasSegiTiga(2, 4);
?>

<!-- selesai -->