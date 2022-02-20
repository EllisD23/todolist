<?php 
require('database.php');

//Get Items
//if (!isset())
//Get todo items
$query = 'SELECT itemNum, title, description FROM todoitems 
          ORDER BY itemNum';

$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My To Do List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="container">
            <div>
                <h2>ToDo List</h2>
                <table>
                    <?php foreach ($todoitems as $todoitem ) :?>
                    <tr>
                        <td><?php echo $todoitem ['Title']; ?></td>
                        <td><?php echo $todoitem ['Description']; ?></td>
                        <td><form action="delete_item.php" method="POST">
                            <input type="hidden" name="itemNum" value="<?php echo $item ['itemNum']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div>
                <h2>Add Item</h2>
                <form action= "<?php echo $_SERVER["PHP_SELF"]?>">
                        <label for="title" class="form-lable">First Name</label>
                        <input type="text" class="form-control" name="title" autocomplete="off"><br>

                        <label for="description" class="form-lable">First Name</label>
                        <input type="text" class="form-control" name="description" autocomplete="off"><br>

                    <button type="submit">Add Item</button>
                </form>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>