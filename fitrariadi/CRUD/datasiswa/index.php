<?php
require "model.php";
if (isset($_POST["cari"])) {
    $datasiswa = cariSiswa($_POST["keyword"]);
} else {
    $datasiswa = getSiswa();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h1>DAFTAR SISWA</h1>
    <button type="button" class="btn btn-primary" style="margin-left: 10px;"><a href="tambah.php">TAMBAH SISWA</a></button>
    <br>

    <br>


    <form action="" method="POST">
    <div class="input-group input-group-lg">
        <button 
            class="input-group-text" 
            type="submit" 
            name="cari"
            id="inputGroup-sizing-lg"
        >
            🔎
        </button>

        <input 
            placeholder="Masukan keyword Pencarian"
            type="text" 
            class="form-control" 
            name="keyword"
            aria-label="Search"
        >
    </div>
</form>

    <br>

    <table class="table">
        <tr>
            <th>NO</th>
            <th>PROFILE</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Data Dibuat</th>
            <th>AKSI</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($datasiswa as $siswa) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><img src="profile/<?= $siswa["img"]  ?>" alt="profile" width="50px" height="50px"></td>
                <td><?= $siswa["nis"]  ?></td>
                <td><?= $siswa["nama"]  ?></td>
                <td><?= $siswa["jurusan"]  ?></td>
                <td><?= $siswa["email"]  ?></td>
                <td><?= $siswa["tanggal_lahir"]  ?></td>
                <td><?= $siswa["data_created"]  ?></td>awdd
                <td>
                    <a class="btn btn-primary" href="{{ route('tampil') }}" role="button">Link</a>
                    <button><a href="update.php?id=<?= $siswa["id"] ?>"> EDIT</a></button>
                    <button><a href="delete.php?id=<?= $siswa["id"] ?>" onclick="return confirm('Yakin Hapus data ini?')"> DELETE</a></button>
                </td>
            </tr>

        <?php $i++;; ?>
        <?php endforeach ;?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>