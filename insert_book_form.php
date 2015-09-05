<?php
include('book_sc_fns.php');

do_html_header("Adding new book");
?>
<form method="post" action="edit_book.php">
    <table>
        <tr>
            <td>ISBN:</td>
            <td><input type="text" name="isbn"></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Author:</td>
            <td><input type="text" name="author"></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td><select name="catid">
        <?php
        $category = get_categories();
        foreach ($category as $item) {
            echo "<option value=\"".$item['catid']."\">".$item['catname']."</option>";
        }
        ?>
            </select></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text" name="description"></td>
        </tr>
    </table>
    <input type="submit" value="Add book">
</form>
<?php
do_html_footer();
?>