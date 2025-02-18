<?php
session_start();
require 'auth.php'; // Include the file with loginUser()

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Now loginUser() will be available
    $admin = loginUser($pdo, $email, $password);

    if ($admin) {
        $_SESSION["admin"] = $admin;
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid credentials"]);
    }
}
?>
