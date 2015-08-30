<?php

function check_admin_user() {
    if (isset($_SESSION['admin_user'])) {
        return true;
    }
    return false;
}

function login($username, $passwd) {
    $conn = db_connect();

    $query = "SELECT * FROM admin
        WHERE  username='".$username."'
        AND password = '".$passwd."'";
    $result = $conn->query($query);
    if (!$result) {
        return false;
    }

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

?>