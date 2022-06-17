<?php

session_start();
require 'functions.php';
  $_SESSION['masuk']="tidak";
if(isset($_POST['email'])){
  $_SESSION['masuk']="masuk";
}

 
  require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

$email=$_POST['email'];
$kode_aktifasi=$_POST['kode_aktifasi'];
$_SESSION['akun']=$email;
// mencari email
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "goturthings") or die('KONEKSI GAGAL!!');

// Cek email sudah ada atau belum
$result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($result)==0){
echo"
<script>
alert('Email tidak ditemukan!')
document.location.href='forgot.php'
</script>
";

return false;
}

$username=query("SELECT * FROM users WHERE email='$email'")[0]['username'];
//Replace space with %20 for url to understand.
$username = str_replace(' ', '%20', $users);


updateAktifasi($_POST);

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "GoturthinQs@gmail.com";
    $mail->Password = "jprlsaijvuirvabd";
    $mail->SetFrom("GoturthinQs@gmail.com");
    $mail->Subject = "Change password GoturthinQs";
    $mail->Body = "Hallo $username, Silahkan ganti password menggunakan kode aktifasi sebagai berikut : <br> <h1 style='text-align:center;'>$kode_aktifasi</h1>";
    $mail->AddAddress($email);
  
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
				header("location:verification_change_password.php");
     }
?>