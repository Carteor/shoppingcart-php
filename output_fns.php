<?php

function do_html_header($title){
    if (!$_SESSION['items']) {
        $_SESSION['items'] = '0';
    }
    if (!$_SESSION['total_price']) {
        $_SESSION['total_price'] = '0.00';
    }
?>

<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <table>
        <tr>
            <td><img src="logo.png"></td>

            <td>Total books: <?php echo $_SESSION['items']; ?> <br />
            Total price: <?php echo $_SESSION['total_price']; ?></td>

            <td><?php display_button("show_cart.php", "show-cart", "Show Cart"); ?></td>
        </tr>
    </table>
    <h1><?php echo $title; ?></h1>


<?php
}

function do_html_footer(){
?>
</body>
</html>
    <?php
}

function display_button($url, $description, $name) {
    echo "<a href=\"".$url."\">" .
        "<img src=\"".$description.".png\" alt=\"".$name."\">".
        "</a>";
}

function display_categories($cat_array) {
    if (!is_array($cat_array)) {
        echo "<i>There are currently no available categories.</i><br />";
        return;
    }

    echo "<ul>";
    foreach ($cat_array as $row) {
        $url = "show_cat.php?catid=".($row['catid']);
        $title = $row['catname'];
        echo "<li>";
        do_html_url($url, $title);
        echo "</li>";
    }
    echo "</ul>";
    echo "<hr />";
}

function display_books($book_array) {
    if (!(is_array($book_array))) {
        echo "<i>There are currently no available books.</i><br />";
        return;
    }

    echo "<ul>";
    foreach ($book_array as $row) {
        $url = "show_book.php?isbn=".($row['isbn']);
        $title = $row['title'];
        $author = $row['author'];
        echo "<li>";
        do_html_url($url, $title);
        echo " author: ".$author;
        echo "</li>";
    }
    echo "</ul>";
    echo "<hr />";
}

function display_cart($cart, $change = true, $images = 1)
{
    echo "<table border = \"0\" width=\"100%\" cellspacing=\"0\">
        <form action=\"show_cart.php\" method=\"post\">
        <tr><th colspan=\"" . (1 + $images) . "\" bgcolor=\"#cccccc\">Product</th>
        <th bgcolor=\"#cccccc\">Price</th>
        <th bgcolor=\"#cccccc\">Amount</th>
        <th bgcolor=\"#cccccc\">All</th>
        </tr>";

    foreach ($cart as $isbn => $qty) {
        $book = get_book_details($isbn);
        echo "<tr>";
        if ($images == true) {
            echo "<td align=\"left\">";
            if (file_exists("images/".$isbn.".jpg")) {
                $size = GetImageSize("images/".$isbn.".jpg");
                if ($size[0] > 0 && $size[1] > 0) {
                    echo "<img src=\"images/".$isbn.".jpg\"
                        style=\"border: 1px solid black\"
                        width=\"".($size[0]/3)."\"
                        height=\"".($size[1]/3)."\"/>";
                }
            } else {
                echo "&nbsp;";
            }
            echo "</td>";
        }
        echo "<td align=\"left\">".
            "<a href=\"show_book.php?isbn=".$isbn."\">".$book['title']."</a>".
            ", author ".$book['author']."</td>".
            "<td align=\"center\">\$".number_format($book['price'], 2)."</td>".
            "<td align=\"center\">";

        if ($change == true) {
            echo "<input type=\"text\" name=\"$isbn\" value=\"$qty\" size=\"3\">";
        } else {
            echo $qty;
        }
        echo "</td>
                <td align=\"center\">\$".number_format($book['price']*$qty, 2)."</td>
                </tr>\n";
    }

    echo "<tr>
            <th colspan=\"".(2+$images)."\" bgcolor=\"#cccccc\">&nbsp;</td>
            <th align=\"center\" bgcolor=\"#cccccc\">".$_SESSION['items']."</th>
            <th align=\"center\" bgcolor=\"#cccccc\">
            \$".number_format($_SESSION['total_price'], 2). "
            </th>
           </tr>";

    if ($change == true) {
        echo "<tr>
                <td colspan=\"".(2+$images)."\">&nbsp;</td>
                <td align=\"center\">
                <input type=\"hidden\" name=\"save\" value=\"true\" />
                <input type=\"image\" src=\"images/save-changes.gif\"
                border=\"0\" alt=\"Save Changes\" />
                </td>
                <td>&nbsp;</td>
                </tr>";
    }
    echo "</form></table>";
}

function do_html_url($url, $title) {
    echo "<a href=\"".$url."\">".$title."</a>";
}

?>