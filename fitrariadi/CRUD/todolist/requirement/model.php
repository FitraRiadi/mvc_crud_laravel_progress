<?php

$conn = mysqli_connect('localhost','root','','todolist');


function getTodo($query = "SELECT * FROM list"){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}



function todoDone($id){
    global $conn;  
    $query = "DELETE FROM list WHERE id = '$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function addTodo($data){
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $todo = htmlspecialchars($data["todo"]);
    $todo_created = date("d-m-Y");
    $days = 24*$data["day"];
    $todo_expired = date("d-m-Y",time()+(60*60*$days));
    $query = "INSERT INTO list VALUES ('','$todo','$todo_created','$todo_expired')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}




?>
