<?php

$conn = mysqli_connect('localhost','root','','datasiswa');

function getSiswa($query="SELECT * FROM siswa"){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($siswa = mysqli_fetch_assoc( $result )){
        $rows[] = $siswa;
    }
    return $rows;
}

function getCount(){
    echo count(getSiswa());
}

function tambahSiswa($data){
    global $conn;
    date_default_timezone_set("Asia/Jakarta");
    $getLastNis = getSiswa()[count(getSiswa())-1]['id']+1;


    $nis = $getLastNis . date("dmY");
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $tanggal_lahir = $data["tanggal_lahir"];
    $email = htmlspecialchars($data["email"]);
    $img = $data["profile"] ? $data["profile"] : "defaultprofile.png";  
    $data_created = date("d-m-Y");

    
    $query = "INSERT INTO siswa VALUES ('','$nis','$nama','$jurusan','$tanggal_lahir','$email','$img','$data_created')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusSiswa($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}



function updateSiswa($id, $data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $tanggal_lahir = $data["tanggal_lahir"];
    $email = htmlspecialchars($data["email"]);
    $img = $data["profile"] ? $data["profile"] : "defaultprofile.png";

    $query = "UPDATE siswa SET nama = '$nama', jurusan = '$jurusan', tanggal_lahir = '$tanggal_lahir', email = '$email', img = '$img' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}


function cariSiswa($keyword) {
    global $conn;
    $data = getSiswa("SELECT * FROM siswa WHERE nama LIKE '$keyword%' OR nis LIKE '$keyword%' OR email LIKE '$keyword%' OR jurusan LIKE '$keyword%'  ");
    return $data;
}


?>