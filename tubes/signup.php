<?php 
// memeriksa sudah login atau belum
session_start();

if(isset($_SESSION["login"])){
header("location:index.php");
exit;
}

// koneksi database
require 'functions.php';

if(isset($_POST["signup"])){
	if(signup($_POST)>0){
  
        echo "
   			<script>
        alert('User baru berhasil ditambahkan!')
			  document.location.href='login.php'
        </script>";
    } else {
        echo mysqli_error($conn);
    }
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

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
	<title>GoturSignup.</title>
</head>
<!-- link my css -->
<link rel="stylesheet" href="css/login.css">


</head>



<body>

	<div class="container">
		<div class="logo">
			<h1>GoturSiQnUp<span>.</span></h1>
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
					<label for="exampleDropdownFormPassword1" class="form-label">Konfirmasi Password</label>
					<input type="password" name="password2" class="form-control" id="exampleDropdownFormPassword1"
						placeholder="Konfirmasi Password" required>
				</div>
				<button type="submit" class="btn btn-outline-danger	" name="signup">Sign Up</button>
			</form>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="login.php">Are you got account? Lets Login</a>
		</div>
	</div>
</body>

</html>