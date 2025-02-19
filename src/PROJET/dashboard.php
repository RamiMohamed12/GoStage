<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["admin"]["name"]); ?>!</h1>

    <div class="button-container">
        <a href="studentadd.php" class="button">Go to Student Add</a>
        <a href="pilot.php" class="button">Go to Pilot</a>
    </div>

    <a href="logout.php">Logout</a>
</body>
</html>
