
<?php 
    include("index.php");
?>

<?php 
require('database.php');
$result = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);

// why won't this work 

if ($result) {
$query = "DELETE FROM todoitems
        WHERE title = '$title'";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $success = $statement->$execute();
    $statement->closeCursor();
}

// investigate

?>
<?php if (isset($_POST['delete'])) {
        
        header('location: http://localhost/weekfour_homeworktry2/index.php');
    }
    // refreshes the page after entry
    // fixed the problem of it trying to navigate to weekfour_homeworktry2/view/index.php
 ?>
