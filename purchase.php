<?php
require('book_sc_fns.php');

session_start();

do_html_header("Final settlement");

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

if ($_SESSION['cart'] && $name && $address && $city && $zip && $country) {
    if (insert_order($_POST) != false) {
        display_cart($_SESSION['cart'], false, 0);
        display_shipping(calculate_shipping_cost());

        display_card_form($name);

        display_button("show_cart.php", "continue-shopping", 'Continue shopping');
    } else {
        echo "Can\'t save data. Please, try again later.";
        display_button("checkout.php", "back", "Back");
    }
} else {
    echo "You didn\'t fill in all fields. Please, try again.<hr />";
    display_button("checkout.php", "back", "Back");
}
do_html_footer();
?>
