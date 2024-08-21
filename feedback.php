<?php

require_once 'db.php';


if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

   
    echo "Name: $name, Email: $email, Message: $message<br>";

   
    if ($name && $email && $message) {
        
        $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $mysqli->error);
        }

       
        $stmt->bind_param("sss", $name, $email, $message);
        
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
