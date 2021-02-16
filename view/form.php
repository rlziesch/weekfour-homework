

<?php if (isset($_POST['submit'])) {
    if (empty($_POST['newtitle'])) {
        $errors = "You must fill in the task";
    } else {
        header('location: index.php');
    }
    // refreshes the page after entry
} ?>


<form class="main-entry__form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input
            class="main-entry__input"
            id="newtitle"
            name="newtitle"
            aria-labelledby="newtitle"
            type="text"
            maxlength="20"
            placeholder="Title"
            autofocus
            required>
        
        <input 
            class="main-entry__input"
            id="newdescription"
            name="newdescription"
            aria-labelledby="newdescription"
            type="text"
            maxlength="50"
            placeholder="Description"
            autofocus
            required>
        <button type="submit" name="submit" class="main-entry__button">Add Item</button>
    </form>

    <?php
        if ($newtitle && $newdescription) {
            $query = "INSERT INTO todoitems
                            (Title, Description)
                            VALUES
                                (:newtitle, :newdescription)";
            $statement = $db->prepare($query);
            $statement->bindValue(':newtitle', $newtitle);
            $statement->bindValue(':newdescription', $newdescription);
            $statement->execute();
            $statement->closeCursor();
        }
    ?>


