<?php 
// echo "<pre>";
// var_dump($_POST['id']);
// echo "</pre>";

$todos = json_decode(file_get_contents("todos.json"), true);
unset($todos[$_POST['id']]);
file_put_contents('todos.json', json_encode($todos, JSON_PRETTY_PRINT));
header('location: index.php');
