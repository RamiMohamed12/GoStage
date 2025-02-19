<?php
session_start();
if (!isset($_SESSION["studnet"])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION["student"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
