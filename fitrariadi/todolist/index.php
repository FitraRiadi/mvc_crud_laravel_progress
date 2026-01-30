<?php
require "requirement/model.php";

$todolist = getTodo();
$todoEmpty = count($todolist) > 0 ? false : true; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h1>MY TODOLIST</h1>

    <br>
    <h3 style="text-align:center;">ADD TODO</h3>
    <form action="requirement/add.php" method="GET" style="margin-left:28.5%; display:flex;gap:10px">
        <label for="todo">Todo : </label> 
        <input type="text" name="todo" placeholder="Todo Info" id="todo"><br> 
        <label for="exp">Expired in Day+ : </label>
        <input type="number" name="day" id="exp" placeholder="Day" value="1"><br>
        <button style="padding:3px 3px; border-radius: 5px; cursor: pointer">➕</button>
    </form>
    <br>
    <?php if (!$todoEmpty) : ?>
        <table border="1" cellpadding="10px" cellspacing="0">
            <tr>
                <th>Todo</th>
                <th>Created</th>
                <th>Expired</th>
                <th>Checks</th>
            </tr>
            <?php foreach( $todolist as $todo ) : ?>
                <tr>
                    <td><?= $todo["todo"] ?></td>
                    <td><?= $todo["todo_created"] ?></td>
                    <td><?= $todo["todo_expired"] ?></td>
                    <td>
                        <button><a href="requirement/done.php?id=<?=  $todo['id'] ?>" onclick="return confirm('Selesaikan Tugas?')">Done ✔️</a></button>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    <?php else : ?>
        <h3 style="text-align:center;">- Hmmm Belum Ada Yang Harus Dilakuin.. -</h3>
    <?php endif; ?>

</body>
</html>