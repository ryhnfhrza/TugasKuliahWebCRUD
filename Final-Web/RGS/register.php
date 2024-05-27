<?php
require '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $alamat = $_POST["alamat"];
    $no_telp = $_POST["no_telp"];

    
    echo "Form submitted.<br>";

    
    if (!empty($username) && !empty($password) && !empty($alamat) && !empty($no_telp)) {
        echo "All fields are filled.<br>";
        
        // Validasi nomor telepon 
        if (!preg_match('/^08[0-9]{8,11}$/', $no_telp)) {
            echo "<script>alert('Nomor telepon harus merupakan nomor Indonesia yang valid, dimulai dengan 08 dan memiliki panjang 10-13 digit.'); window.history.back();</script>";
            exit();
        }
        echo "Phone number is valid.<br>";

       
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $alamat = mysqli_real_escape_string($conn, $alamat);
        $no_telp = mysqli_real_escape_string($conn, $no_telp);

        // Periksa username 
        $check_query = "SELECT * FROM user WHERE BINARY username = '$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
           
            echo "<script>alert('Username sudah digunakan. Silakan gunakan username yang lain.'); window.history.back();</script>";
        } else {
            echo "Username is available.<br>";

            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            echo "Password hashed.<br>";

            
            $insert_query = "INSERT INTO user (username, password, alamat, no_telp) 
                            VALUES ('$username', '$hashed_password', '$alamat', '$no_telp')";
            if (mysqli_query($conn, $insert_query)) {
                
                header("Location: ../login/login.php");
                exit();
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
        }
    } else {
       
        echo "<script>alert('Semua field harus diisi.'); window.history.back();</script>";
    }
}


mysqli_close($conn);
?>
