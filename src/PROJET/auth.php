<?php 
require 'db.php'; 

function loginUser($pdo, $email, $password) { 
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?"); 
    $stmt->execute([$email]); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password,$user['password'])){ 
        return $user; 
    }
    return false; 
}
?>
