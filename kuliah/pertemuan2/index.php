<?php
//ini komentar
/* 
ini komentar
juga
*/

// Pertemuan ke 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// eco, print
// print_r
// var_dump

echo "Muhamad Jamaludin";
echo 123;
echo true;
echo false;
echo "Jum'at";

// Penulisan Shintaks
// 1. PHP di dalam HTML 
// 2. HTML di dalam PHP
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>

<body>
    <!-- PHP Di Dalam HTML  lebih bagus ini-->
    <h1>Hello, Selamat Datang <?php echo "Muhamad Jamaludin"; ?></h1>
    <p><?php echo "ini adalah paragraf"; ?></p>

    <!-- HTML Di Dalam PHP -->
    <?php echo "<h1>Hello, Selamat Datang Jamjam</h1>"; ?>
</body>

</html>

<!-- LANJUT PHP DIBAWAG INI -->

<?php
// Variabel dan Tipe Data
// Variabel
// tidak boleh diawali angka, tapi boleh mengandung angka cnth $6nama ini ga boleh tapi $nama666

$nama = "Jamjam";

?>

<!-- PHP Di Dalam HTML  lebih bagus ini-->
<h1>Hello, Selamat Datang <?php echo $nama; ?></h1>
<p><?php echo "ini adalah paragraf"; ?></p>


<?php
// Oprator
// - Aritmatika
// +    -   *   /   %
$x = 10;
$y = 20;
echo $x * $y;

// Penggabung string / concatenation / concat / jadi terhubung
// .
$nama_depan = "Muhamad";
$nama_belakang = "Jamaludin";
echo $nama_depan . " " . $nama_belakang;
// " " untunk sepasi . untuk menggabungakn nama

// Assignment Oprator
// =, +=, *=, /=, %=, .=
$x = 1;
$x -= 5;
echo $x;

// gabungan nama juga
$nama = "Muhamad";
$nama .= " ";
$nama .= "Jamaludin";
echo $nama;

// Oprator Perbandingan
// <, >, <=, >=, ==, !=
// cara buat != -> "! ="
// var_dump. buat mengecek kebenaran true or false

// ini true
var_dump(1 < 5);
// ini false
var_dump(1 > 5);

// == fungsi nya untuk apakah sama atau tidak aja tampilannya
// ini true
var_dump(1 == "1");

// Oprator Identitas
// ===, !==
// kalo mau liat identitas sebuah isi nilai pakenya yang ini ===
// ini false
var_dump(1 === "1");

// ! == jadinya !==
// ini true
var_dump(1 !== "1");



// Oprator Logika
// &&, ||, !
// && diartikan dan, sama kalo dan ini itu kemungkinan nya harus bener dua duanya ga boleh satu
// $x % 2 == 1. ditandakan ganjil
// ini true
$x = 5;
var_dump($x < 20 && $x % 2 == 1);

// $x % 2 == 0. ditandakan ganap
// ini true
$x = 10;
var_dump($x < 20 && $x % 2 == 0);

// ini false
$x = 30;
var_dump($x < 20 && $x % 2 == 0);
// karena yang pertama nya salah 30 kecil 20 tapi yang kedua bener 30 itu bilangan bulat.

// || kalo ini dinamakan or atau. walau salah satu salah tetep jawabanya true
$x = 30;
var_dump($x < 20 || $x % 2 == 0);

?>


<!-- selesai -->