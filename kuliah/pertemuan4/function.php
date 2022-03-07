<?php
function salam($waktu = "Datang", $nama = "Jamjam") {
    return "selamat $waktu, $nama!";
};


?>

<!DOCTYPE html>
<title>Function PHP</title>
</head>

<body>
    <h1><?= salam("Pagi"); ?></h1>
</body>

</html>

<!-- selesai -->