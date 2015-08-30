<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Adding category");
if (check_admin_user()) {
    if (filled_out($_POST)) {
        $catname = $_POST['catname'];

        if (insert_category($catname)) {
            echo "<p>Category ".$catname." added</p>";
        } else {
            echo "<p>Category ".$catname." can\'t be added</p>";        }
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