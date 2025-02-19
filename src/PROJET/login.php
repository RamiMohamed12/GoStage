<?php
session_start();
require 'auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["user_type"]; // This should be sent from your login form

    $user = loginUser($pdo, $email, $password, $userType);

    if ($user) {
        // Store user data in session with their role
        $_SESSION["user"] = $user;
        $_SESSION["role"] = $user['role'];
        
        echo json_encode([
            "success" => true,
            "role" => $user['role'],
            "message" => "Login successful"
        ]);
    } else {
        echo json_encode([
            "success" => false, 
            "message" => "Invalid credentials"
        ]);
    }
}
?>
