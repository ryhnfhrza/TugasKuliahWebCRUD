<?php
session_start();
include '../database.php';

if (isset($_GET['id'])) {
    
    $bookingId = $_GET['id'];

    
    $query = "DELETE FROM booking WHERE id_booking = $bookingId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        header("Location: profile.php");
        exit();
    } else {
        echo "Gagal melakukan penghapusan.";
    }
}
?>
