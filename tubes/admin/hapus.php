<?php
// memeriksa sudah login atau belum
session_start();
require 'functions.php';


if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level/index.php");
exit;
}





if(!isset($_GET['id'])){
    header('location:dashboard.php');
}


$id= $_GET["id"];
// query data mahasiswa berdasarkan id
$produk= query("SELECT * FROM produk WHERE id=$id")[0]; // supaya ga manggil 0 nya lagi

if(empty($produk)){
	header("location:dashboard.php");
}


$id = $_GET["id"];
if (delete($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus!')
        document.location.href='dashboard.php'
        </script>";
} else {
    echo "
        <script>
        alert('data gagal dihapus!')
        document.location.href='dashboard.php'
        </script>";
}