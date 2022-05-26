<?php
// ARRAY
// Array adalah variable yang dapat menyimpan dari satu nilai sekaligus

$hari1 = "Senin";
$hari2 = "Selasa";
$hari7 = "Minggu";

$bulan1 = "Januari";
$bulan12 = "Desember";

$mahasiswa = "Sandhika";

// Membuat ARRAY
$hari = ["Senin", "Selasa", "Rabu", "Kamis"]; //Cara baru
$bulan = array("Januari", "Febuari", "Maret"); //Cara lama

$myArray = [100, "Sandhika", true];


// Menampilkan Array
// menampilkan 1 element menggunakan index, index dimulai dari 0

echo $hari[1];
echo  "<br>";
echo $bulan[2];
echo "<hr>";

// Menampilkan semua isi array sekaligus
// var_dump() atau print_r()
// khusus debugging
var_dump($hari);
echo  "<br>";
print_r($bulan);

// Mencetak semua isi array menggunalan looping
echo $hari[0];
echo  "<br>";
echo $hari[1];
echo  "<br>";
echo $hari[2];
echo  "<br>";
echo $hari[3];
echo  "<br>";

// for

for ($i = 0; $i < count($hari); $i++) {
    echo $hari[$i];
    echo "<br>";
}
echo "<hr>";

// foreach
foreach ($bulan as $b) {
    echo $b;
    echo "<br>";
}
echo "<hr>";

// Memanipulasi Array
// MEnambahkan elemen di akhir array
$hari[4] = "Jum'at";
$hari[] = "Sabtu";
var_dump($hari);
?>

<!-- selesai -->