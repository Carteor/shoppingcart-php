<?php
require_once('book_sc_fns.php');

do_html_header("Update book");

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$catid = $_POST['catid'];
$price = $_POST['price'];
$description = $_POST['description'];
$old_isbn = $_GET['old_isbn'];

if(edit_book($isbn, $title, $author, $catid, $price, $description, $old_isbn)) {
    echo "<p>Book updated.</p>";
} else {
    echo "<p>Can\'t update book.</p>";
}

do_html_footer();

?>