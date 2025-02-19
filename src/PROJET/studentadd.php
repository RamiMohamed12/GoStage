<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO student (name, date_of_birth, location, year, email, password, phone_number, description) 
                VALUES (:name, :date_of_birth, :location, :year, :email, :password, :phone_number, :description)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':name' => $_POST['name'],
            ':date_of_birth' => $_POST['date_of_birth'],
            ':location' => $_POST['location'],
            ':year' => $_POST['year'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ':phone_number' => $_POST['phone_number'],
            ':description' => $_POST['description']
        ]);
        
        $success_message = "Student registered successfully!";
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
    <title>Add Student</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <?php if (isset($success_message)) echo "<p style='color: green'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p style='color: red'>$error_message</p>"; ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="div">
                <div class="form">
                    <label>Name:</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form">
                    <label>Date of birth:</label>
                    <input type="date" name="date_of_birth" required>
                </div>
                <div class="form">
                    <label>Location:</label>
                    <input type="text" name="location" required>
                </div>
                <div class="form">
                    <label>Year:</label>
                    <select name="year" required>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                    </select>
                </div>
                <div class="form">
                    <label>E-mail:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form">
                    <label>Phone number:</label>
                    <input type="tel" name="phone_number" required>
                </div>
                <div class="form">
                    <label>Description:</label>
                    <textarea name="description"></textarea>
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
