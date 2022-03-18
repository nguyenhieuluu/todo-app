<?php 
    $todos = []; 
    if (file_exists('todo.json')){        
        $json = file_get_contents('todo.json');
        $todos = json_decode($json, true);
    }
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
</head>

<body>
    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button> New Todo</button>
    </form>
    <br>

<?php foreach ($todos as $todoname => $todo): ?> 
    <div style="margin-bottom: 20px">
        <form style="display:inline-block" action="change_status.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todoname ?>" >
            <input type="checkbox"  <?php echo $todo['completed'] ? 'checked' : '' ?>>
            <?php echo $todoname ?>
        </form>

        <form style="display:inline-block" action="delete.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todoname ?>" >
            <button>Delete</button>
        </form>
        
    </div>
<?php endforeach; ?>


<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(cb => {
        cb.onclick = function () {
            this.parentNode.submit();
        };
    })
</script>


</body>





</html>