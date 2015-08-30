<?php
require_once('book_sc_fns.php');
session_start();

if (isset($_POST['username']) && isset($_POST['passwd'])) {
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if (login($username, $passwd)) {
        $_SESSION['admin_user'] = $username;
    } else {
        do_html_header("Problem: ");
        echo "<p>Can\'t log in system.<br />
            To view this page you need to log in.</p>";
        do_html_url("login.php", "Log In");
        do_html_footer();
        exit;
    }
}

do_html_header("Administration");
if (check_admin_user()) {
    display_admin_menu();
} else {
    echo "<p>You do not have permission to access
        the administration page.</p>";
}

do_html_footer();
?>