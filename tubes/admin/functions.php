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


function conn($query) {
    global $conn;
    
    $result = mysqli_query($conn, $query);
    
    return $result;
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
    $warna = $data["warna"];


    $kodeProduk= str_replace("'","",$kode_produk);
    $namaProduk= str_replace("'","",$nama_produk);
    $hargaBaru=preg_replace("/[^0-9]/", "", $harga);
    $keteranganBaru= str_replace("'","",$keterangan);

    $gambar=upload();

    if(!$gambar){
        return false;
    }

    // query insert data
    $query ="INSERT INTO `produk`(`jenis_produk`, `kode_produk`, `nama_produk`, `ukuran`, `harga`, `keterangan`, `gambar`,`warna`) VALUES ('$jenis_produk','$kodeProduk','$namaProduk','$ukuran','$hargaBaru','$keteranganBaru','$gambar','$warna');";

if($ukuran==''||$jenis_produk==''){
            echo
        "        <script>
        alert('pilih ukuran terlebih dahulu!')
        document.location.href='tambah.php'
        </script>";
}

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
alert('Ukuran gambar terlalu besar!')
    </script>";
    return false;
}

// lolos pengecekan, gambar siap upload
// generate nama gambar baru
$namaFileBaru=uniqid();
$namaFileBaru.='.';
$namaFileBaru.=$ekstensiGambar;



move_uploaded_file($tmpName, '../img/'.$namaFileBaru); 
return $namaFileBaru;
}




// Function Upload profile
function uploadProfile(){
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
if($ukuranFile > 10000000){
          echo"<script>
alert('Ukuran gambar terlalu besar!')
document.location.href='profile-edit.php'  
    </script>";
    return false;
}

// lolos pengecekan, gambar siap upload
// generate nama gambar baru
$namaFileBaru=uniqid();
$namaFileBaru.='.';
$namaFileBaru.=$ekstensiGambar;



move_uploaded_file($tmpName, '../profile/'.$namaFileBaru); 
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
    $warna=htmlspecialchars($data["warna"]);

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



    $query = "UPDATE `produk` SET `id`='$id',`jenis_produk`='$jenis_produk',`kode_produk`='$kodeProduk',`nama_produk`='$namaProduk',`ukuran`='$ukuran',`harga`='$hargaBaru',`keterangan`='$keteranganBaru',`gambar`='$gambar',
     `warna`='$warna'
    WHERE `id`='$id';
                ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);


}




//  Function cari
// function cari($keyword){

// $jumlahDataPerHalaman=2;
// $jumlahData= count(query("SELECT * FROM produk"));
// $jumlahHalaman= ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
// $awalData=($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;

// if($keyword==""){
// $query = "SELECT * FROM produk
//              WHERE
//             nama_produk LIKE '%$keyword%' OR
//             jenis_produk LIKE '%$keyword%' OR
//             ukuran LIKE '%$keyword%' OR
//             harga LIKE '%$keyword%' OR
//             kode_produk LIKE '%$keyword%' OR
//             keterangan LIKE '%$keyword%'
//             ORDER BY id DESC
//             LIMIT $awalData,$jumlahDataPerHalaman  
//             ";

//               return query ($query);


// }else{
//    $query = "SELECT * FROM produk
//              WHERE
//             nama_produk LIKE '%$keyword%' OR
//             jenis_produk LIKE '%$keyword%' OR
//             ukuran LIKE '%$keyword%' OR
//             harga LIKE '%$keyword%' OR
//             kode_produk LIKE '%$keyword%' OR
//             keterangan LIKE '%$keyword%'
//             ORDER BY id DESC
//             ";

//               return query($query);
// }

    
// }



//  Function cari
function cari($keyword){

$keyword=$_GET['cari'];

   $query = "SELECT * FROM produk
              WHERE jenis_produk = '$keyword'
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
        alert('konfirmasi password tidak sesuai!');
        document.location.href='signup.php'
        </script>
        ";
        
        return false;
    }


    // enkriosi password
$password=password_hash($password, PASSWORD_DEFAULT);   




    // tambahkan user baru ke database
mysqli_query($conn, "INSERT INTO `users`(`username`, `password`, `level`) VALUES ('$username','$password', 'user')");

return mysqli_affected_rows($conn);

}





// Change Password
// mencari username
function confrim($data){
    global $conn;

    $username= strtolower(stripslashes($data["username"]));


// Cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");

$user='location:forgot.php?username='.$username.'';

if(mysqli_num_rows($result)==0){
echo"
<script>
alert('Username tidak ditemukan!')
document.location.href='forgot.php'
</script>
";
return false;
}else if(mysqli_num_rows($result)>0){  
echo'
<script>
alert("Username ditemukan!")
</script>
';

header("$user");

}



}




// Change
function changepw($data){
    global $conn, $username;

    $username= strtolower(stripslashes($data["username"]));
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);


    $user="        <script>
        alert('konfirmasi password tidak sesuai!');
        document.location.href='forgot.php?username=".$username."'
        </script>";
    // cek konsfirmasi password
    if($password !== $password2){
        echo $user;
        
        return false;
    }


    // enkriosi password
$password=password_hash($password, PASSWORD_DEFAULT);   

$result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
if(mysqli_num_rows($result)==0){
echo"
<script>
alert('Username tidak diketahui!')
document.location.href='forgot.php'
</script>
";
return false;
}else if(mysqli_num_rows($result)>0){

    // tambahkan user baru ke database
mysqli_query($conn, "UPDATE users SET password='$password' WHERE username='$username'");


return mysqli_affected_rows($conn);

}


}



//rupiah
function rupiah($harga){
	global $conn;

	$hasil_rupiah = "Rp. " . number_format($harga,2,',','.');
	return $hasil_rupiah;
 




}


//rupiah
function idr($harga){
	global $conn;

	$hasil_rupiah = "IDR " . number_format($harga,0,',','.');
	return $hasil_rupiah;
 
}


// profile
function editFoto($data){
 global $conn;

     $id=htmlspecialchars($data["id"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);

 // cek apakah user pilih gambar baru atau tidak
if($_FILES['gambar']['error']===4){
    $gambar=$gambarLama;
}else{
    $gambar=uploadProfile();
}


$query = "UPDATE `users` SET `foto`='$gambar' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}




function edit($data){

 global $conn;

    $id=htmlspecialchars($data["id"]);
    $username =htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email= htmlspecialchars($data["email"]);
    $noTelp = ($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gender = htmlspecialchars($data["gender"]);
    $lahir=htmlspecialchars($data["lahir"]);

    $user=$_SESSION['username'];




if($username==$user){


$query = "UPDATE `users` SET `email`='$email',`no_telp`='$noTelp',`gender`='$gender',`alamat`='$alamat',`lahir`='$lahir' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// Cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");

if(mysqli_fetch_assoc($result)){
echo"
<script>
alert('Username sudah terdaftar!')
document.location.href='profile-edit.php'
</script>
";

return false;
}

// username nya tidak ada yang sama


  // cek apakah user pilih gambar baru atau tidak

if($username!=$user){

$query = "UPDATE `users` SET `username`='$username',`email`='$email',`no_telp`='$noTelp',`gender`='$gender',`alamat`='$alamat',`lahir`='$lahir' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);


echo"
<script>
alert('Username telah diubah!')
document.location.href='../logout.php'
</script>
";


    return mysqli_affected_rows($conn);

}
}



// Function ubah level
function ubahLevel($id) {
    global $conn;

    mysqli_query($conn, "UPDATE users SET level='admin' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}


// Function ban
function banLevel($id) {
    global $conn;

    mysqli_query($conn, "UPDATE users SET status='ban' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}


// Function heal
function healLevel($id) {
    global $conn;

    mysqli_query($conn, "UPDATE users SET status='no' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}


?>