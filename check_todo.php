<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

$todos = json_decode(file_get_contents("todos.json"), true);
$todos[$_POST['todo_name']]['completed'] = !$todos[$_POST['todo_name']]['completed'];
file_put_contents("todos.json", json_encode($todos, JSON_PRETTY_PRINT));
header('location: index.php');