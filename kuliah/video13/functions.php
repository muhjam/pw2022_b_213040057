<!-- ANALOGI TEMEN NUNJUKIN BAJU KELUARIN DULU BAJUNYA KEBASKOM BARU TUNJUKIN -->

<!-- RESULT ITU DI ANALOGIKAN LEMARI -->

<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
   $conn=koneksi();
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// TAMBAH

function tambah($data) {
   $conn=koneksi();

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO mahasiswa
            VALUES
            ( '00000' , '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
   $conn=koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
   $conn=koneksi();

    $id= ($data["id"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query update data
    $query = "UPDATE mahasiswa SET
                nrp='$nrp',
                nama='$nama',
                email='$email',
                jurusan='$jurusan',
                gambar='$gambar'
                WHERE id='$id';
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>