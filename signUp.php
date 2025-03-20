<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/login.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if username or email already exists
    $stmt = $con->prepare("SELECT username, email FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($existing_username, $existing_email);
        $stmt->fetch();
        
        if ($existing_username == $username) {
            echo "<p style='color:red;'>Username already exists! Please choose a different username.</p>";
        } elseif ($existing_email == $email) {
            echo "<p style='color:red;'>Email is already registered! <a href='login.php'>Login here</a></p>";
        }
    } else {
        // Validation
        if (!preg_match("/^[a-zA-Z0-9_]{5,20}$/", $username)) {
            echo "<p style='color:red;'>Invalid username. Only letters, numbers, and underscores allowed (5-20 characters).</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;'>Invalid email format.</p>";
        } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            echo "<p style='color:red;'>Password must be at least 8 characters long and include an uppercase letter, lowercase letter, number, and special character.</p>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $con->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($stmt->execute()) {
                echo "<p style='color:green;'>Registration successful! <a href='login.php'>Login here</a></p>";
            } else {
                echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
            
            //$stmt->close();
        }
    }

    $stmt->close();
}
?>


        <form method="post">
            Username: <input type="text" name="username" required><br>
            Email: <input type="text" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
