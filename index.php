<?php
require __DIR__ . "/vendor/autoload.php";

if (file_exists("todos.json")) {
    $todos = json_decode(file_get_contents("todos.json"), true);
} else {
    $todos = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
</head>

<body>
    <form action="create.php">
        <input type="text" name="todoName" id="todo-name">
        <button type="submit">Save</button>
    </form>
</body>

<?php foreach ($todos as $todoName => $todo): ?>
    <div>
        <form action="check_todo.php" method="post" style="display: inline-block;">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
            <input id="checks" class="checks" type="checkbox" <?= $todos[$todoName]['completed'] ? 'checked' : '' ?>>
        </form>
        <p style="display: inline-block;"><?= $todoName ?></p>
        <form action="/delete.php" method="post" style="display: inline-block">
            <input type="hidden" name="id" value="<?php echo $todoName ?>">
            <button type="submit">Delete</button>
        </form>
    </div>
<?php endforeach; ?>
<script src="script.js"></script>

</html>