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
$username=$_POST['username'];
$kode_aktifasi=$_POST['kode_aktifasi'];

// Cek username sudah ada atau belum
// koneksi ke database
$conn=koneksi();
$result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND status='on'");
$result2=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND status='non'");



if(mysqli_fetch_assoc($result2)){

mysqli_query($conn, "DELETE FROM users WHERE `users`.`email` = '$email'");

}else if(mysqli_fetch_assoc($result)){
echo"
<script>
alert('Akun anda sudah terdaftar!')
document.location.href='signup.php'
</script>
";

return false;

} 


if(isset($_POST['signup'])){
  if(signup($_POST)>0){

    } else {
        echo mysqli_error($conn);
    }
}




$_SESSION['akunbaru']="$email";

//Replace space with %20 for url to understand.
// $username = str_replace(' ', '%20', $users);






    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "GoturthinQs@gmail.com";
    $mail->Password = "jprlsaijvuirvabd";
    $mail->SetFrom("GoturthinQs@gmail.com");
    $mail->Subject = "Confirm your account GoturthinQs";
    $mail->Body = "Selamat datang $username ditoko kami, Silahkan masukan kode aktifasinya : <br> <h1 style='text-align:center;'>$kode_aktifasi</h1>";
    $mail->AddAddress($email);

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
				header("location:verification.php");
     }
?>