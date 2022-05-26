<?php
//array associative
//array yang indexnya berupa String, yang berpasangan dengan nilainya
$mahasiswa = [
    [
        "nama"=>"Muhamad Jamaludin",
        "npm"=>"213040057", 
        "email"=>"muhhjam@gmail.com",
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"img/muhamadjamaludin.png"
    ],
    [
        "nama"=>"Rivialdi",
        "npm"=>"213040049", 
        "email"=>"rivialdi@gmail.com", 
        "jurusan"=>"Teknik Informatika",
         "gambar"=>"https://asset-a.grid.id/crop/0x0:0x0/700x0/photo/2019/03/27/1294082232.jpg"
    ],
    [
        "nama"=>"Jimmy", 
        "npm"=>"213040050", 
        "email"=>"jimmy@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://image-cdn.medkomtek.com/0XQSS75sph8vByC8mFS65aBA_6I=/640x480/smart/klikdokter-media-buckets/medias/2314574/original/025865300_1588818043-Heboh-Video-Balita-Ditarik-Monyet-Bisa-Jadi-Si-Kecil-Trauma-pada-Hewan-shutterstock_370756442.jpg"
    ],
    [
        "nama"=>"Lanang", 
        "npm"=>"213040046", 
        "email"=>"lanang@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://img.lovepik.com/photo/20211123/medium/lovepik-monkey-picture_500834513.jpg"
    ],
    [
        "nama"=>"Rivan", 
        "npm"=>"213040045", 
        "email"=>"rivan@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://i.pinimg.com/originals/c1/e3/86/c1e386fd42f81a50c35eb99a8610db82.jpg"
    ],
    [
        "nama"=>"Jauhari", 
        "npm"=>"213040060", 
        "email"=>"jauhari@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://www.duniaq.com/wp-content/uploads/2016/02/gambar-lucu-banget.jpg"
    ],
    [
        "nama"=>"Audi", 
        "npm"=>"213040076", 
        "email"=>"audi@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://i2.wp.com/berbagaigadget.com/wp-content/uploads/2016/03/100-Gambar-DP-BBM-Meme-Kocak-Lucu-Abis-55.jpg?resize=904%2C892"
    ],    
    [
        "nama"=>"Ahmad", 
        "npm"=>"213040077", 
        "email"=>"ahmad@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://divedigital.id/wp-content/uploads/2022/01/1-anak-sd-nangis.jpg"
    ],
    [
        "nama"=>"Ardhi", 
        "npm"=>"213040082", 
        "email"=>"ardhi@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://divedigital.id/wp-content/uploads/2022/01/38-Anak-Kecil-Hujan-hujanan.jpg"
    ],
    [
        "nama"=>"Rendi", 
        "npm"=>"213040081", 
        "email"=>"rendi@gmail.com", 
        "jurusan"=>"Teknik Informatika",
        "gambar"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt4NwiQjtN0sCKFDGCOAhh6_m47dConpA-vg&usqp=CAU"
    ]
];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Detail Mahasiswa</title>
</head>

<body>
    <div class="container">
        <h1>Detail Mahasiswa</h1>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= $_GET["gambar"] ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $_GET["nama"]; ?></h5>
        <p class="card-text"><?= $_GET["npm"]; ?></p>
        <p class="card-text"><?= $_GET["email"];?></p>
        <p class="card-text"><?= $_GET["jurusan"]; ?></p>

				<a href="kuliah_latihan3.php">Kembali</a>
      </div>
    </div>
  </div>
</div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<!-- selesai -->