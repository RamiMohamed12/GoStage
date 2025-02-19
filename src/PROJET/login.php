<?php 
require 'db.php'; 

function loginUser($pdo, $email, $password, $userType) { 
    // Validate user type
    $allowedTables = ['admin', 'student', 'pilote'];
    if (!in_array($userType, $allowedTables)) {
        return false;
    }

    $stmt = $pdo->prepare("SELECT * FROM " . $userType . " WHERE email = ?"); 
    $stmt->execute([$email]); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) { 
        // Add the user type to the result
        $user['role'] = $userType;
        return $user; 
    }
    return false; 
}
?>
