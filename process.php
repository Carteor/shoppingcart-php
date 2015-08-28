<?php
require ('book_sc_fns.php');

session_start();

do_html_header("Final settlement");

$card_type = $_POST['card_type'];
$card_number = $_POST['card_number'];
$card_month = $_POST['card_month'];
$card_year = $_POST['card_year'];
$card_name = $_POST['card_name'];

if ($_SESSION['cart'] && $card_type && $card_number &&
    $card_month && $card_year && $card_name) {
    display_cart($_SESSION['cart'], false, 0);

    display_shipping(calculate_shipping_cost());

    if (process_card($_POST)) {
        session_destroy();

        echo "<p>Thank you for having taken advantage of our
            website to make purchases. Your order placed.</p>";
        display_button("index.php", "continue-shopping", "Continue shopping");
    } else {
        echo "<p>Can\'t process your credit card. Please contact the issuing
            organization or try again.</p>";
        display_button("purchase.php", "back", "Back");
    }
} else {
    echo "<p>You didn\'t fill in all fields. Please, try again.</p><hr />"
    display_button("purchase.php", "back", "Back");
}

do_html_footer();
?>