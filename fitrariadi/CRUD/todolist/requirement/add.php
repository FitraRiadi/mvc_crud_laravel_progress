<?php

require "model.php";

if (addTodo($_GET) > 0){
    echo 
    "
    <script>
        alert('Todo Ditambahkan!');
        document.location.href = '../index.php';
    </script>
    ";
} else {
    echo 
    "
    <script>
        alert('Todo Gagal Ditambahkan!');
        document.location.href = '../index.php';
    </script>
    ";
}


?>