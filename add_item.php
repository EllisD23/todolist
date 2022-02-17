<?php
// get the item 
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');

//check input
/*if ($title == null || $title == false || $description == null || $description == false ){
    $error = "Check all fields and try again.";
    include('database_error.php');
} else*/// {
    require_once('database.php');

    //add item
    $query = 'INSERT INTO todoitems (Title, Description)
              VALUES (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();

    //display Todolist
    include('index.php');
//}
?>