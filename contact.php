<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    
    if ($name && $email && $subject && $message) {
        
        $sql = "INSERT INTO contact_us (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $mysqli->error);
        }

      
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
          
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

       
        $stmt->close();
    } else {
        echo "All fields are required.";
    }

   
    $mysqli->close();
}
?>
