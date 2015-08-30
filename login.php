<?php
include('book_sc_fns.php');
do_html_header("Administration");
?>
<form method="post" action="admin.php">
    Username: <input type="text" name="username"><br />
    Password: <input type="password" name="passwd"><br />
    <input type="submit" value="Login">
</form>
<?php
do_html_footer();
?>