<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO pilote (name, location, email, password) 
                VALUES (:name, :location, :email, :password)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':name' => $_POST['name'],
            ':location' => $_POST['location'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);
        
        $success_message = "Pilot registered successfully!";
    } catch(PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pilot</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Pilot Registration</h2>
        <?php if (isset($success_message)) echo "<p style='color: green'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p style='color: red'>$error_message</p>"; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="div">
                <div class="form">
                    <label>Name:</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form">
                    <label>Location:</label>
                    <input type="text" name="location" required>
                </div>
                <div class="form">
                    <label>E-mail:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
            </div>
            <div class="submit">
                <button type="submit">Save</button>
            </div>
        </form>
        <div style="margin-top: 20px; text-align: center;">
            <a href="dashboard.php" style="text-decoration: none; color: #007bff;">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
