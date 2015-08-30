<?php

require_once('book_sc_fns.php');
session_start();
@ $old_admin = $_SESSION['admin_user'];

unset($_SESSION['admin_user']);
$result_dest = session_destroy();

do_html_header("Exit");

if (!empty($old_admin)) {
    if ($result_dest) {
        echo 'Successfully exited the system.<br/>';
        do_html_url('index.php', 'Main Site'); echo "<br />";
        do_html_url('login.php', 'Log In');
    } else {
        echo 'Can\'t exit the system.<br />';
    }
}    else {
        echo 'You didn\'t sign in, so can\'t exit.<br />';
        do_html_url('index.php', 'Main Site'); echo "<br />";
        do_html_url('login.php', 'Log In');
}

do_html_footer();

?>