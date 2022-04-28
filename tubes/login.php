<?php
// cek udah login apa belum
session_start();

// cek cookie
if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
	$id=$_COOKIE['id'];
	$key=$_COOKIE['key'];

	// ambil username berdasarkan id
	$result= mysqli_query($conn, "SELECT username FROM users WHERE id=$id");
	$row=mysqli_fetch_assoc($result);

	// cek cookie dan username
	if($key===hash('sha256', $row['username'])){
		$_SESSION['login']=true;
	}
}


if(isset($_COOKIE['login'])){
	if($_COOKIE['login']=='true'){
		$_SESSION['login']=true;
	}
}


if(isset($_SESSION["login"])){
header("location:index.php");
exit;
}


// koneksi database
require 'functions.php';



// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["login"])) {

$username=$_POST["username"];
$password=$_POST["password"];

// Cek user name
$result=mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

if(mysqli_num_rows($result)){

    // Cek password
$row=mysqli_fetch_assoc($result);
if(password_verify($password, $row["password"])){
	// set session
$_SESSION["login"]=true;

// cek remember me
if(isset($_POST['remember'])){
	// buat cookie


	setcookie('id', $row['id'], time() + 60);
	setcookie('key', hash('sha256', $row['username']), time() + 60);
}

    header("Location:index.php");
    exit;
    }
}

$error=true;

}
?>

<!DOCTYPE html>
<html>

<head>
	<!--icon  -->
	<link rel="icon" href="icon/icon.png">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font-Awessome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
	<title>GoturLogin.</title>
</head>

<style>
.container {
	margin: auto;
}

.content {
	margin: 30px auto;
	padding: 10px;
	width: 50%;
	height: 50%;
	box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
}

.container .logo {
	margin: 30px auto 0 auto;
	width: 50%;
	height: 50%;
}

.container .logo h1 {
	margin-bottom: -2px;
	text-align: center;
	font-weight: 400;
	font-family: 'Libre Bodoni',
		sans-serif;
	text-transform: uppercase;
	color: #151e3d;
	;
}

.container .logo h1 span {
	color: red;
}

.container .logo .subtitle {
	color: rgba(0, 0, 0, 0.692);
	text-align: center;
	font-weight: 500;
	font-family: 'Montserrat',
		sans-serif;
	text-transform: uppercase;
}


p {
	color: red;
	font-style: italic;
	font-size: 15px;
}
</style>

<body>

	<div class="container">
		<div class="logo">
			<h1>Goturloqin<span>.</span></h1>
			<h6 class="subtitle">tempat trifthingnya bandung</h6>
		</div>

		<div class="content">
			<form action="" method="post" class="px-4 py-3">
				<div class="mb-3">

					<?php if (isset($error)) : ?>
					<p>username / password salah!</p>
					<?php endif; ?>

					<label for="exampleDropdownFormEmail1" class="form-label">Username</label>
					<input type="text" name="username" class="form-control" id="exampleDropdownFormEm"
						placeholder="Masukan Username" required>
				</div>
				<div class="mb-3">
					<label for="exampleDropdownFormPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1"
						placeholder="Masukan Password" required>
				</div>
				<div class="mb-3">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="dropdownCheck" name="remember">
						<label class="form-check-label" for="dropdownCheck">
							Remember me
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-danger" name="login">Sign in</button>
			</form>
			<div class="ig" style="text-align:right;">
				<a href="https://www.instagram.com/goturthings/" target="_blank"><i class="fab fa-instagram"
						style="margin-right:10px;color: #151e3d;font-weight:bold;"> goturthing</i></a>
			</div>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="signup.php">New around here? Sign up</a>
			<a class="dropdown-item" href="#">Forgot password?</a>
		</div>
	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<!-- selesai -->