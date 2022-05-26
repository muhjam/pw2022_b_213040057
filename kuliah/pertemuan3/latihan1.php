<?php
// Pengulangan
// for
// While
// do.. while
// foreach : pengulangan khusus array

// Pengulangan 1

for ($i = 0; $i < 5; $i++) {
    echo "Hello World!<br>";
}

// Pengulangan 2
// di cek dulu pertama kalo false jadi nya ga dikerjakan
while ($i < 5) {
    echo "Hello World! <br>";
    $i++;
}

// Pengulangan 3
// langsung kerjakan seklali terus liat apa true atau false kalo true bakal ada pengulangan kalo false bakal muncul sekali
$i = 10;
do {
    echo "Hello World! <br>";
    $i++;
} while ($i < 5);

?>

<!-- slesai -->