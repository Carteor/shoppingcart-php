<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Adding book");
if (check_admin_user()) {
    if (filled_out($_POST)) {
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $catid = $_POST['catid'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        if (insert_book($isbn, $title, $author, $catid, $price, $description)) {
            echo "<p>Book <em>".stripslashes($title)."</em> added to database.</p>";
        } else {
            echo "<p>Book <em>".stripslashes($title).
                "</em> can\'t be added to database.</p>";
        }
    } else {
        echo "<p>You didn\'t fill in all fields. Please try again.</p>";
    }

    do_html_url('admin.php', 'Back to administration menu');
} else {
    echo "<p>You do not have permission to access the
        administration page.</p>";
}

do_html_footer();

?>