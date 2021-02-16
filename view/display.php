
<?php
$query = 'SELECT Title, Description
        FROM todoitems';

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
?>


<table>
    <thead>
        <tr>
            <th>
               <h2> Current Tasks </h2>
            </th>
        </tr>

        <tbody>

        <?php foreach ($results as $result) :
            ?>
                <tr>
                    <td class="main-entry__input">
                        <b><?php echo $result['Title']; ?></b><br>
                        <?php echo $result['Description']; ?>
                    </td>

                    <td>
                        
                        <form class="delete" action="view/delete.php" method="POST">
                        <input type="hidden" name="title">  
                        <input type="hidden" name="description">        
                        <button type="submit" name="delete">Delete ❌</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>



        </tbody>
    </thead>

</table>

