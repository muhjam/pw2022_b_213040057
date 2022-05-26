<?php
// array
// variabel yang dapat dimiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// array adalah pasangan antara key dan value
// key-nya adalah index, yang dimulai dari 0

// membuat array
// cara lama
$hari = array("senin", "selasa", "rabu");

// cara baru
$bulan = ["januari", "febuari", "maret"];
$arr1 = [123, "tulisan", false];

// menampilkan array
// var_dump() / print_r()
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

//  menampilkan 1 elemen pada array
echo $hari[0];
echo "<br>";
echo $bulan[1];
echo "<br>";


// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "kamis";
$hari[] = "jum'at";
var_dump($hari);
?>

<!-- selesai -->