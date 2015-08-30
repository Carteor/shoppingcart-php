<?php
include('book_sc_fns.php');

do_html_header("Adding new book");
?>
<form method="post" action="insert_book.php">
    ISBN: <input type="text" name="isbn"><br />
    Title: <input type="text" name="title"><br />
    Author: <input type="text" name="author"><br />
    Category:
    <select name="catid">
<?php
$category = get_categories();
foreach ($category as $item) {
    echo "<option value=\"".$item['catid']."\">".$item['catname']."</option>";
}
?>
    </select> <br />
    Price: <input type="text" name="price"> <br />
    Description: <input type="text" name="description"><br />
    <input type="submit" value="Add book">
</form>
<?php
do_html_footer();
?>