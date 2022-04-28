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


    $kodeProduk= str_replace("'","",$kode_produk);
    $namaProduk= str_replace("'","",$nama_produk);
    $hargaBaru=preg_replace("/[^0-9]/", "", $harga);
    $keteranganBaru= str_replace("'","",$keterangan);

    $gambar=upload();

    if(!$gambar){
        return false;
    }

    // query insert data
    $query ="INSERT INTO `produk`(`jenis_produk`, `kode_produk`, `nama_produk`, `ukuran`, `harga`, `keterangan`, `gambar`) VALUES ('$jenis_produk','$kodeProduk','$namaProduk','$ukuran','$hargaBaru','$keteranganBaru','$gambar');";

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
function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE `produk`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}


// Ubah data
function ubah($data) {
    global $conn;
    $id=htmlspecialchars($data["id"]);
    $jenis_produk =($data["jenis_produk"]);
    $kode_produk= htmlspecialchars($data["kode_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $ukuran = ($data["ukuran"]);
    $harga = htmlspecialchars($data["harga"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);


    $kodeProduk= str_replace("'","",$kode_produk);
    $namaProduk= str_replace("'","",$nama_produk);
    $hargaBaru=preg_replace("/[^0-9]/", "", $harga);
    $keteranganBaru= str_replace("'","",$keterangan);

    // cek apakah user pilih gambar baru atau tidak
if($_FILES['gambar']['error']===4){
    $gambar=$gambarLama;
}else{
    $gambar=upload();
}



    $query = "UPDATE `produk` SET `id`='$id',`jenis_produk`='$jenis_produk',`kode_produk`='$kodeProduk',`nama_produk`='$namaProduk',`ukuran`='$ukuran',`harga`='$hargaBaru',`keterangan`='$keteranganBaru',`gambar`='$gambar' WHERE `id`='$id';
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


// Signup
function signup($data){
    global $conn;

    $username= strtolower(stripslashes($data["username"]));
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);


// Cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");

if(mysqli_fetch_assoc($result)){
echo"
<script>
alert('Username sudah terdaftar!')
document.location.href='signup.php'
</script>
";

return false;
}


    // cek konsfirmasi password
    if($password !== $password2){
        echo "
        <script>
        alert('konfirmasi password tidak sesuai');
        </script>
        ";
        
        return false;
    }


    // enkriosi password
$password=password_hash($password, PASSWORD_DEFAULT);   




    // tambahkan user baru ke database
mysqli_query($conn, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')");

return mysqli_affected_rows($conn);

}


?>