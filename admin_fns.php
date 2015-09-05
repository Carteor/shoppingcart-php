<?php

function display_book_form($book) {
?>
    <form method="post" action="edit_book.php?old_isbn=<?php echo $book['isbn']; ?>">
        <table border="0">
            <tr>
                <td>ISBN: </td>
                <td><input type="text" name="isbn" value="<?php
                    echo $book['isbn'];
                ?>"/></td>
            </tr>
            <tr>
                <td>Title: </td>
                <td><input type="text" name="title" value="<?php
                    echo $book['title'];
                ?>" /></td>
            </tr>
            <tr>
                <td>Author: </td>
                <td><input type="text" name="author" value="<?php
                    echo $book['author'];
                ?>"/></td>
            </tr>
            <tr>
                <td>Category: </td>
                <td>
                    <select name="catid">
                        <?php
                        $cat_array=get_categories();
                        foreach($cat_array as $thiscat) {
                            echo "<option value=\"".$thiscat['catid']."\"";
                            if ( $thiscat['catid'] == $book['catid']) {
                                echo " selected";
                            }
                            echo ">".$thiscat['catname']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Price: </td>
                <td><input type="text" name="price" value="<?php
                    echo $book['price'];
                ?>" /></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><textarea row="3" cols="50" name="description">
                        <?php echo $book['description']; ?>
                    </textarea></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update  book" />
                </td>
                <td>
                    <form method="post" action="delete_book.php">
                    <input type="hidden" name=\"isbn\"
                        value=" <?php echo $book['isbn']; ?>" />
                    <input type="submit" value="Delete book" />
                    </form>
                </td>

            </tr>
        </table>
    </form>
<?php
}
?>