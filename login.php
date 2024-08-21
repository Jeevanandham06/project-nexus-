<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        
        $sql = "SELECT * FROM user_data WHERE username = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $mysqli->error);
        }

      
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

           
            if (password_verify($password, $user['password'])) {
              
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: exp.html");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    } else {
        echo "Both fields are required.";
    }

  
    $mysqli->close();
}
?>
