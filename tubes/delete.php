<?php
require 'functions.php';

$kode_produk = $_GET["kode_produk"];
if (hapus($kode_produk) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus!')
        document.location.href='index.php'
        </script>";
} else {
    echo "
        <script>
        alert('data gagal dihapus!')
        document.location.href='index.php'
        </script>";
}
