<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

   
    if ($username && $email && $password && $confirm_password) {
     
        if ($password === $confirm_password) {
           
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

           
            $sql = "INSERT INTO user_data (username, email, password) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            if ($stmt === false) {
                die("Prepare failed: " . $mysqli->error);
            }

            $stmt->bind_param("sss", $username, $email, $hashed_password);

            
            if ($stmt->execute()) {
                header("Location: thankyou_login.html");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "All fields are required.";
    }

  
    $mysqli->close();
}
?>
