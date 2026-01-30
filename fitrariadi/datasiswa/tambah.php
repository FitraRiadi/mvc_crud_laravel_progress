<?php

require "model.php";

if (isset($_POST["submit"])) {
    if (tambahSiswa($_POST) > 0){
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = './'; 
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
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
    <title>DATA SISWA - TAMBAH DATA</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h1>TAMBAH DATA</h1>
    <button><a href="./">🏠 KEMBALI</a></button>
    <br>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama Siswa : </label>
                <input type="text" name="nama" id="nama" required>
            </li>

            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>

            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>

            <li>
                <label for="tanggallahir">Tanggal Lahir : </label>
                <input type="date" name="tanggal_lahir" id="tanggallahir" required>
            </li>

            <li>
                <label for="profile">Profile (Optional) : </label>
                <input type="file" name="profile" id="profile" value="defaultprofile.png" >
            </li>
            
            <li>
                <button name="submit">➕ Tambah Data</button>
            </li>
            
        </ul>
    </form>

</body>
</html>