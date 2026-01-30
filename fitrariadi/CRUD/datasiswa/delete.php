<?php

require "model.php";

$id = $_GET["id"];
if (hapusSiswa($id) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = './'; 
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = './'; 
        </script>
        ";
}
?>