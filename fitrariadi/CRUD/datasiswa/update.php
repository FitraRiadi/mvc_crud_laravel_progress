<?php

require "model.php";

$id = $_GET['id'];
$siswa = getSiswa("SELECT * FROM siswa WHERE id = '$id' ")[0];

if (isset($_POST["submit"])) {
    if (updateSiswa($id,$_POST) > 0){
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href = './'; 
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = './'; 
        </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA SISWA - EDIT DATA</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h1>EDIT DATA</h1>
    <button><a href="./">🏠 KEMBALI</a></button>
    <br>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <ul>
            
            <li>
                <label for="nama">Nama Siswa : </label>
                <input type="text" name="nama" id="nama" value = <?= $siswa["nama"] ?>>
            </li>

            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value = <?= $siswa["jurusan"] ?>>
            </li>

            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" value = <?= $siswa["email"] ?>>
            </li>

            <li>
                <label for="tanggallahir">Tanggal Lahir : </label>
                <input type="date" name="tanggal_lahir" id="tanggallahir" value = <?= $siswa["tanggal_lahir"] ?>>
            </li>

            <li>
                <label for="profile">Profile (Optional) : </label>
                <input type="file" name="profile" id="profile" value="<?= $siswa['img'] ?>" >
            </li>
            
            <li>
                <button name="submit">➕ Perbarui Data</button>
            </li>
            
        </ul>
    </form>

</body>
</html>