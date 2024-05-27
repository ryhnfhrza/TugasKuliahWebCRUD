<?php
require '../database.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    
    $check_query = "SELECT * FROM user WHERE BINARY username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "taken";
    } else {
        echo "available";
    }
}


mysqli_close($conn);
?>
