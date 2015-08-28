<?php
require('book_sc_fns.php');

session_start();

do_html_header();

if ($_SESSION['cart'] && array_count_values($_SESSION['cart'])) {
    display_cart($_SESSION['cart'], false, 0);
    display_checkout_form();
} else {
    echo "<p>Your cart is empty</p>";
}

display_button("show_cart.php", "continue-shopping", "Continue shopping");

do_html_footer();
?>