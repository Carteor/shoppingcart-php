<?php
include('book_sc_fns.php');

do_html_header("Edit book information");

$book = get_book_details($_GET['isbn']);
display_book_form($book);

do_html_footer();

?>