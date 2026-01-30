<?php
require "model.php";

if (todoDone($_GET["id"]) > 0){
    echo 
    "
    <script>
        alert('Tugas Berhasil Diselesaikan!');
        document.location.href = '../index.php';
    </script>
    ";
} else {
    echo 
    "
    <script>
        alert('Tugas Gagal Diselesaikan!');
        document.location.href = '../index.php';
    </script>
    ";
}
?>




