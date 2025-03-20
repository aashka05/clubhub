<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === "login") {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            echo json_encode(["status" => "error", "message" => "Email and password are required!"]);
            exit();
        }

        $sql = "SELECT user_id, username, email, password, user_type FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_type'] = $row['user_type'];

                echo json_encode(["status" => "success", "message" => "Login successful!", "redirect" => "dashboard.php"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid email or password!"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid email or password!"]);
        }
        $stmt->close();
    } elseif ($action === "signup") {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($name === '' || $email === '' || $password === '') {
            echo json_encode(["status" => "error", "message" => "All fields are required!"]);
            exit();
        }

        $check_sql = "SELECT email FROM user WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "Email already registered!"]);
            $check_stmt->close();
            exit();
        }
        $check_stmt->close();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_sql = "INSERT INTO user (username, email, password, user_type) VALUES (?, ?, ?, 'student')";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $name, $email, $hashed_password);

        echo json_encode([
            "status" => $insert_stmt->execute() ? "success" : "error",
            "message" => $insert_stmt->execute() ? "Account created successfully!" : "Signup failed! Try again.",
            "redirect" => "dashboard.php"
        ]);
        $insert_stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #0000001a;
            width: 300px;
        }
        .container h2 {
            text-align: center;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .container button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container button:hover {
            background: #218838;
        }
        .toggle-link {
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>

<div class="container" id="login-container">
    <h2>Login</h2>
    <form id="login-form">
        <input type="email" id="login-email" placeholder="Email" required>
        <input type="password" id="login-password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="toggle-link" onclick="toggleForms()">Don't have an account? Sign Up</p>
</div>

<div class="container" id="signup-container" style="display: none;">
    <h2>Sign Up</h2>
    <form id="signup-form">
        <input type="text" id="signup-name" placeholder="Full Name" required>
        <input type="email" id="signup-email" placeholder="Email" required>
        <input type="password" id="signup-password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form>
    <p class="toggle-link" onclick="toggleForms()">Already have an account? Login</p>
</div>

<script>
function toggleForms() {
    document.getElementById('login-container').style.display = 
        document.getElementById('login-container').style.display === 'none' ? 'block' : 'none';
    document.getElementById('signup-container').style.display = 
        document.getElementById('signup-container').style.display === 'none' ? 'block' : 'none';
}

document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=login&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.status === 'success') window.location.href = data.redirect;
    });
});

document.getElementById('signup-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('signup-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;

    fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=signup&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.status === 'success') window.location.href = data.redirect;
    });
});
</script>

</body>
</html>
