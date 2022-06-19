<!-- kemungkinan-->
<?php
// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

    // cek username & password
    if ($_POST["username"] == "jamjam" && $_POST["password"] == "666") {
        // jika benar, redirect ke halaman admin
        header("Location: admin.php");
        exit;
    } else if ($_POST["username"] == "" && $_POST["password"] == "") {
        $error1 = true;
    } else {
        // jika salah, tampilkan pesan kesalahan
        $error2 = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
    }

    .content {
        margin: 10px 0;
        padding: 10px;
        width: fit-content;
        height: fit-content;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
    }


    p {
        color: red;
        font-style: italic;
        font-size: 15px;
    }

</style>

<body>

    <div class="container">
        <div class="content">
            <h1>Login Admin</h1>

            <?php if (isset($error1)) : ?>
                <p>masukan username & password!</p>
            <?php endif; ?>
            <?php if (isset($error2)) : ?>
                <p>username / password salah!</p>
            <?php endif; ?>

            <table>


                <form action="" method="post">
                    <tr>

                        <td><label for="nama"> Username</label></td>
                        <td>:</td>
                        <td><input type="text" name="username" id="nama">
                        </td>


                    </tr>
                    <tr>

                        <label>
                            <td><label for="password">Password</label></td>
                            <td>:</td>
                            <td>
                                <input type="password" name="password" id="password">
                            </td>
                        </label>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit" name="submit">Login</button>
                        </td>

                    </tr>
                </form>

            </table>
        </div>
    </div>
</body>

</html>

<!-- selesai -->