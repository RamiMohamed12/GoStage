<?php 

$host = 'localhost';
$dbname = 'project'; 
$user = 'root';
$pass = 'rami2004';

try { 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]); 
} catch(PDOException $e) { 
    die("Connection to the database failed: " . $e->getMessage()); 
} 

?>
