<?php

function display_book_form($book = '') {
    $edit = is_array($book);

    ?>
    <form method="post" action="<?php
        echo $edit ? 'edit_book.php' : 'insert_book.php';
    ?>">
        <table border="0">
            <tr>
                <td>ISBN: </td>
                <td><input type="text" name="isbn" value="<?php
                    echo $edit ? $book['isbn'] : '';
                ?>"/></td>
            </tr>
            <tr>
                <td>Title: </td>
                <td><input type="text" name="title" value="<?php
                    echo $edit ? $book['title'] : '';
                ?>" /></td>
            </tr>
            <tr>
                <td>Author: </td>
                <td><input type="text" name="title" value="<?php
                    echo $dit ? $book['title'] : '';
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
                            if (($edit) && ($thiscat['catid'] == $book['catid'])) {
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
                    echo $edit ? $book['price'] : '';
                ?>" /></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><textarea row="3" cols="50" name="description">
                        <?php echo $edit ? $book['description'] : ''; ?>
                    </textarea></td>
            </tr>
            <tr>
                <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
                    <?php
                    if ($edit) {
                        echo "<input type=\"hidden\" name=\"oldisbn\" value=\"".
                            $book['isbn']."\" />";
                    }
                    ?>
                    <input type="submit" value="<?php
                        echo $edit ? 'Update' : 'Add';
                        ?> book " />
                </td>
                <?php
                    if ($edit) {
                        echo "<td>
                            <form method=\"post\" action=\"delete_book.php\">
                            <input type=\"hidden\" name=\"isbn\"
                            value=\"" . $book['isbn'] . "\" />
                            <input type=\"submit\" value=\"Delete book\" />
                            </form></td>";
                    }
                ?>
            </tr>
        </table>
    </form>
<?php
}