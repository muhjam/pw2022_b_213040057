<?php
require_once('/vendor/autoload.php');

require 'functions.php';
$goturthings=query("SELECT * FROM produk");



$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();