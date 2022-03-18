<?php
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json, true);

    $todoname = $_POST['todo_name'];
    unset($jsonArray[$todoname]);
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    header('Location: main.php');

?>