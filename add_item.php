<?php
// get the item 
$title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_GET, 'decription', FILTER_SANITIZE_STRING);

//check input
if ($title == null || $title == false || $description == null || $description == false ){
    $error = "Check all fields and try again.";
    echo $error;
    include('index.php');
} else {
    require_once('database.php');

    //add item
    $query = 'INSERT INTO todoitems (title, description)
              VALUES (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();

    //display Todolist
    include('index.php');
}
?>