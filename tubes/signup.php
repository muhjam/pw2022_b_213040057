<?php 
// memeriksa sudah login atau belum
session_start();

// cek apakah sudah login
if(isset($_SESSION["level"])){

if($_SESSION['level']=="admin"){
	header("location:admin/index.php");
exit;
}else if($_SESSION['level']=="user"){
	header("location:index.php");
exit;
}


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
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
		content="trifthing, bandung, baju bekas, online shope, fashion, baju keren, baju bekas keren, barang bekas, barang keren, goturthinqs, goturthings, tempat trifthing" />
	<meta name="author" content="Jam-Jam" />


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
	<title>GoturthinQs.</title>

	<style>
	#preloader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(../loader/loader.gif) center no-repeat #fff;
	}

	@media(max-width:767px) {

		.logo {
			margin: 30px auto 0 auto;
		}

		.logo h1 {
			margin-bottom: -2px;
			text-align: center;
			font-weight: 400;
			font-family: 'Libre Bodoni', sans-serif;
			text-transform: uppercase;
			color: #151e3d;
			;
		}

		.logo h1 span {
			color: red;
		}

		.logo .subtitle {
			color: rgba(0, 0, 0, 0.692);
			text-align: center;
			font-weight: 500;
			font-family: 'Montserrat', sans-serif;
			text-transform: uppercase;
			margin-bottom: 20px;
		}

		p {
			color: red;
			font-style: italic;
			font-size: 15px;
		}

		.logo .subtitle {
			color: rgba(0, 0, 0, 0.692);
			text-align: center;
			font-weight: 500;
			font-family: 'Montserrat', sans-serif;
			text-transform: uppercase;
			font-size: 10px;
		}
	}

	@media(min-width:768px) {
		.konten {
			margin: 30px auto;
			padding: 10px;
			width: 50%;
			height: 100%;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
		}

		.logo {
			margin: 30px auto 0 auto;
			width: 50%;
			height: 50%;
		}

		.logo h1 {
			margin-bottom: -2px;
			text-align: center;
			font-weight: 400;
			font-family: 'Libre Bodoni', sans-serif;
			text-transform: uppercase;
			color: #151e3d;
			;
		}

		.logo h1 span {
			color: red;
		}

		.logo .subtitle {
			color: rgba(0, 0, 0, 0.692);
			text-align: center;
			font-weight: 500;
			font-family: 'Montserrat', sans-serif;
			text-transform: uppercase;
			font-size: 20px;
		}

		p {
			color: red;
			font-style: italic;
			font-size: 15px;
		}
	}
	</style>

	<!-- link my css -->
	<link rel="stylesheet" href="css/login.css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

</head>


<body>



	<div class="container-fluid">

		<div class="logo">
			<h1>GoturSiQnUp<span>.</span></h1>
			<h6 class="subtitle">Buat account keren kalian disini</h6>
		</div>

		<div class="konten">
			<form action="" method="post" class="px-4 py-3">
				<div class="mb-3">


					<?php if (isset($error)) : ?>
					<p>Konfirmasi password tidak sesuai</p>
					<?php endif; ?>

					<label for="exampleDropdownFormEmail1" class="form-label">Username</label>
					<input type="text" name="username" class="form-control" id="exampleDropdownFormEm"
						placeholder="Masukan Username" required maxlength="20">
				</div>
				<div class="mb-3">
					<label for="exampleDropdownFormPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1"
						placeholder="Masukan Password" required minlength="8">
				</div>
				<div class="mb-3">
					<label for="exampleDropdownFormPassword1" class="form-label">Konfirmasi Password</label>
					<input type="password" name="password2" class="form-control" id="exampleDropdownFormPassword1"
						placeholder="Konfirmasi Password" required minlength="8">
				</div>
				<button type="submit" class="btn btn-outline-danger " name="signup">Sign Up</button>

			</form>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="login.php">Are you got account? Lets Login</a>
			<a class="dropdown-item" href="index.php">Back to shopping</a>
		</div>
	</div>



	<!-- my javascript -->
	<script src="js/script.js"></script>


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