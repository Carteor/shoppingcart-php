<?php
include('book_sc_fns.php');
do_html_header("Delete");

$isbn = $_POST['isbn'];
if (delete_book($isbn)) {
    echo "<h1>Book successfully deleted</h1>";
} else {
    echo "<h1>Can\'t delete book</h1>";
}
do_html_footer();

?>