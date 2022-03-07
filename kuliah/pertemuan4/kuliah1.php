<?php
// 4 - FUNCTION
// built-in function

// date()
// untuk mengetahui waktu saat ini
// Default timezone: UTC (-7 jam)

echo date("G, l, j F Y");
echo "<hr>";
echo date("l", time());
echo "<hr>";


// time()
// UNIX Timestamp // 
// Detik yang sudah berlalu sejak 
echo time() + 60 * 60 * 24;
echo "<hr>";

// hari apa 100 hari kebelakang
echo date("l", time() - 60 * 60 * 24 * 100);
echo "<hr>";

// mktime()
// membuat waktu berdasarkan format
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
echo mktime(10, 45, 0, 3, 5, 2022);
echo "<hr>";
echo date("l", mktime(0, 0, 0, 12, 20, 2002));
echo "<hr>";
echo strtotime("2 june 2003");
echo "<br>";
echo date("l", strtotime("2 june 2003"));
echo "<hr>";

// fungsi
// pow() untuk pangkat
echo pow(2, 3); /* jadi di bacanya 2 pangkat 3 */
echo "<br>";
echo rand(1, 10); /* jadi random */
echo "<br>";
// pembulatan
echo round(2.7); /* pendekatan nilai akan jadi 3 */
echo "<br>";
echo ceil(2.1); /* pembulatan ke atas (ceiling / langit langit) */
echo "<br>";
echo floor(2.9); /* pembulatan kebawah, mau hasilnya mendekati 3 apapun jadi nya 2 */
?>


<!-- selesai -->