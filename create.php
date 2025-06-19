<?php

require __DIR__. "/Helpers/functions.php";

$todos = json_decode(file_get_contents('todos.json'),true);

if ($_GET) {
    $todo_name = $_GET['todoName'];
    $todos[$todo_name]['completed'] = false;
    header('location: index.php');
}

file_put_contents('todos.json', json_encode($todos, JSON_PRETTY_PRINT));