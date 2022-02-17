<?php 
require('database.php');

//Get todo items
$queryAllItems = 'SELECT * FROM todoitems';

$statement = $db->prepare($queryAllItems);
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
                    <?php foreach ($items as $item ) :?>
                    <tr>
                        <td><?php echo $item ['itemTitle']; ?></td>
                        <td><?php echo $item ['itemDescription']; ?></td>
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
                <form action="add_item.php" method="POST" id="addItem">
                    <label for="Tiile"></label>
                    <input type="text" name="title" placeholder="Title"><br>

                    <label for="Description"></label>
                    <input type="text" name="Description" placeholder="Description"><br>

                    <label for="submit">&nbsp;</label>
                    <input type="submit" value="Add Item">
                </form>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>