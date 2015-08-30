<?php
function get_categories() {
    $conn = db_connect();
    $query = 'select catid, catname from categories';
    $result = @ $conn->query($query);
    if (!$result) {
        return false;
    }
    $num_cats = $result->num_rows;
    if ($num_cats == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}

function get_books($catid) {
    $conn = db_connect();
    $query = "SELECT isbn, author, title FROM books WHERE catid='".$catid."'";
    $result = $conn->query($query);
    if (!$result) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}

function get_category_name($catid) {
    $catid = intval($catid);
    $conn = db_connect();
    $query = "SELECT catname FROM categories WHERE catid = '".$catid."'";
    $result = $conn->query($query);
    if (!$result) {
        return false;
    }
    $num_cats = $result->num_rows;
    if ($num_cats == 0) {
        return false;
    }
    $row = $result->fetch_object();
    return $row->catname;
}

function get_book_details($isbn) {
    $conn = db_connect();
    $query = "SELECT isbn, author, title, catid, price, description FROM books WHERE isbn = '".$isbn."'";
    $result = $conn->query($query);
    $result = $result->fetch_array();
    return $result;
}

function display_book_details($book) {
?>
<ul>
    <li>Author: <?php echo $book['author']; ?></li>
    <li>ISBN: <?php echo $book['isbn']; ?></li>
    <li>Price: <?php echo $book['price']; ?></li>
    <li>Description: <?php echo $book['description']; ?></li>
</ul>
<?php
}

function calculate_price($cart) {
    $price = 0.0;
    if (is_array($cart)) {
        $conn = db_connect();
        foreach ($cart as $isbn => $qty) {
            $query = "select price from books where isbn='".$isbn."'";
            $result = $conn->query($query);
            if ($result) {
                $item = $result->fetch_object();
                $item_price = $item->price;
                $price += $item_price * $qty;
            }
        }
    }
    return $price;
}

function calculate_items($cart) {
    $items = 0;
    if (is_array($cart)) {
        foreach($cart as $isbn => $qty) {
            $items += $qty;
        }
    }
    return $items;
}

function insert_book($isbn, $title, $author, $catid, $price, $description) {
    $conn = db_connect();

    $query = "SELECT * FROM books
      WHERE isbn = '$isbn'";
    $result = $conn->query($query);

    if ($result && ($result->num_rows > 0)) {
        echo "This book already exists.<br />";
    } else {
        $query = "INSERT INTO books VALUES (
          '".$isbn."', '".$author."', '".$title."', '".$catid."',
          '".$price."', '".$description."')";
        if (!$result = $conn->query($query)) {
            return false;
        } else {
            echo "Book added";
            return true;
        }
    }
}

function insert_category($catname) {
    $conn = db_connect();

    $query = "SELECT * FROM categories
      WHERE catname = '$catname'";
    $result = $conn->query($query);

    if ($result && ($result->num_rows > 0)) {
        echo "This category already exists.<br />";
    } else {
        $query = "INSERT INTO categories VALUES (DEFAULT, '".$catname."')";
        if (! $result = $conn->query($query)) {
            return false;
        } else {
            echo "Category added";
            return true;
        }
    }
}

?>