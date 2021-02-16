<?php
    require('view/database.php');
?>

<?php
    $newtitle = filter_input(INPUT_POST, "newtitle", FILTER_SANITIZE_STRING);
    $newdescription = filter_input(INPUT_POST, "newdescription", FILTER_SANITIZE_STRING);

    $title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_GET, "description", FILTER_SANITIZE_STRING);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sass/main.css">
    <title>My Todo List</title>
</head>
<body>

    <?php include("view/header.php"); ?>

    <section>
    <?php
        $query = 'SELECT Title, Description
                FROM todoitems';
                $statement = $db->prepare($query);
                $statement->execute();
                $todoitems = $statement->fetchAll();
                $statement->closeCursor();

    //check if it returned results below
    if ($todoitems) { ?>
        <?php include("view/display.php")?>
    <?php } else { ?>    
        <h2>No todo list items exist yet.</h2>
    <?php } ?>
    </section>

    
    <section>
        <?php 
        // form to input new tasks
        include("view/form.php"); ?>
    </section>




</body>
</html>