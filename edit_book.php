<?php
include('delete_book.php');

do_html_header("Update book");

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$catid = $_POST['catid'];
$price = $_POST['price'];
$description = $_POST['description'];

if(insert_book($isbn, $title, $author, $catid, $price, $description)) {
    echo "<p>Book updated.</p>";
} else {
    echo "<p>Can\'t update book.</p>";
}

do_html_footer();

?>