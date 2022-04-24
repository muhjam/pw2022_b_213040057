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


// TAMBAH
function tambah($data) {
    global $conn;

    $jenis_produk =($data["jenis_produk"]);
    $kode_produk= htmlspecialchars($data["kode_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $ukuran = ($data["ukuran"]);
    $harga = htmlspecialchars($data["harga"]);
    $keterangan = htmlspecialchars($data["keterangan"]);


    $gambar=upload();

    if(!$gambar){
        return false;
    }

    // query insert data
    $query ="INSERT INTO produk
            VALUES
            ( '$jenis_produk' , '$kode_produk', '$nama_produk', '$ukuran', '$harga', '$gambar', '$keterangan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Function Upload
function upload(){
    $namaFile= $_FILES['gambar']['name'];
    $ukuranFile=$_FILES['gambar']['size'];
    $error=$_FILES['gambar']['error'];
    $tmpName=$_FILES['gambar']['tmp_name'];

// cek apakah tidak ada gambar yang diupload
if($error===4){
    echo"<script>
    alert('pilih gambar terlebih dahulu!');    
    </script>";
    return false;
}

//  cek apakah yang diupload adalah gambar
$ekstensiGambarValid=['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar= strtolower(end($ekstensiGambar));

if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo"<script>
alert('Yang anda upload bukan gambar!');    
    </script>";
    return false;
}

//  Cek jika ukuran nya terlalu besar
if($ukuranFile > 1000000){
          echo"<script>
alert('Ukuran gambar terlalu besar!');    
    </script>";
    return false;
}

// lolos pengecekan, gambar siap upload
// generate nama gambar baru
$namaFileBaru=uniqid();
$namaFileBaru.='.';
$namaFileBaru.=$ekstensiGambar;



move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
return $namaFileBaru;
}








// Function delete
function delete($kode_produk) {
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE `produk`.`kode_produk` = '$kode_produk'");
    return mysqli_affected_rows($conn);
}


// Ubah data
function ubah($data) {
    global $conn;

    $jenis_produk =($data["jenis_produk"]);
    $kode_produk= htmlspecialchars($data["kode_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $ukuran = ($data["ukuran"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = "UPDATE produk SET
                jenis_produk='$jenis_produk',
                kode_produk='$kode_produk',
                nama_produk='$nama_produk',
                ukuran='$ukuran',
                harga='$harga',
                gambar='$gambar',
                keterangan='$keterangan'
                WHERE kode_produk='$kode_produk';
                ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);


}







//  Function cari
function cari($keyword){
    $query = "SELECT * FROM produk
              WHERE
              nama_produk LIKE '%$keyword%' OR
              jenis_produk LIKE '%$keyword%' OR
               ukuran LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' OR
                kode_produk LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%'
              ";

              return query($query);
}


?>