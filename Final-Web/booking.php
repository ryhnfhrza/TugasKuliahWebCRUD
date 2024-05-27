<?php
session_start();
include 'database.php';

if (!isset($_SESSION['user_id'])) {
    
    header("Location: ../login/login.php");
    exit; 
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_date = $_POST['booking_date'];
    $id_user = $_SESSION['user_id']; 
    $harga = 100000; 

    if (empty($booking_date)) {
        $error_message = "Tanggal pemesanan diperlukan.";
    } else {
        $stmt = $conn->prepare("INSERT INTO booking (id_user, tanggal, harga) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $id_user, $booking_date, $harga);

        if ($stmt->execute()) {
            header("Location: profile/profile.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
