<?php
require_once('book_sc_fns.php');
do_html_header("Add category");
?>

<form method="post" action="insert_category.php">
    Category name: <input type="text" name="catname"><br />
    <input type="submit" value="Add category">
</form>

<?php
do_html_footer();
?>