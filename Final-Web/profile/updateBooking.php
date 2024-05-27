<?php
session_start();
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $bookingId = $_POST['booking_id'];
    $newDate = $_POST['new_date'];
    

    
    $query = "UPDATE booking SET tanggal = '$newDate' WHERE id_booking = $bookingId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        header("Location: profile.php");
        exit();
    } else {
        echo "Gagal melakukan update.";
    }
}
?>
