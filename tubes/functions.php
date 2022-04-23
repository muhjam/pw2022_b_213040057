<!-- ANALOGI TEMEN NUNJUKIN BAJU KELUARIN DULU BAJUNYA KEBASKOM BARU TUNJUKIN -->

<!-- RESULT ITU DI ANALOGIKAN LEMARI -->

<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "goturthings");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($kode_produk) {
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE kode_produk=$kode_produk");
    return mysqli_affected_rows($conn);
}
?>