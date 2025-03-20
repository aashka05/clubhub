<?php
session_start();
include 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === "login") {
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $password = trim($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            exit(json_encode(["status" => "error", "message" => "Email and password are required!"]));
        }

        $sql = "SELECT user_id, username, email, password, user_type FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            exit(json_encode(["status" => "error", "message" => "Database error: Failed to prepare statement."]));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                session_regenerate_id(true); // Prevent session fixation attacks
                
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_type'] = $row['user_type'];

                $stmt->close();
                exit(json_encode(["status" => "success", "message" => "Login successful!", "redirect" => "dashboard.php"]));
            } else {
                $stmt->close();
                exit(json_encode(["status" => "error", "message" => "Incorrect password!"]));
            }
        } else {
            $stmt->close();
            exit(json_encode(["status" => "error", "message" => "No account found with this email!"]));
        }
    } 
    
    elseif ($action === "signup") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $password = trim($_POST['password'] ?? '');

        if (empty($name) || empty($email) || empty($password)) {
            exit(json_encode(["status" => "error", "message" => "All fields are required!"]));
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            exit(json_encode(["status" => "error", "message" => "Invalid email format!"]));
        }

        // Check if email already exists
        $check_sql = "SELECT email FROM user WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        if (!$check_stmt) {
            exit(json_encode(["status" => "error", "message" => "Database error: Failed to prepare statement."]));
        }

        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $check_stmt->close();
            exit(json_encode(["status" => "error", "message" => "Email already registered!"]));
        }
        $check_stmt->close();

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $insert_sql = "INSERT INTO user (username, email, password, user_type) VALUES (?, ?, ?, 'student')";
        $insert_stmt = $conn->prepare($insert_sql);
        if (!$insert_stmt) {
            exit(json_encode(["status" => "error", "message" => "Database error: Failed to prepare statement."]));
        }

        $insert_stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($insert_stmt->execute()) {
            $insert_stmt->close();
            exit(json_encode(["status" => "success", "message" => "Account created successfully!", "redirect" => "dashboard.php"]));
        } else {
            $insert_stmt->close();
            exit(json_encode(["status" => "error", "message" => "Signup failed! Try again."]));
        }
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication - CampusClubHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #8b5cf6, #6366f1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .btn-primary {
            background-color: #8b5cf6;
            border-color: #8b5cf6;
        }
        
        .btn-primary:hover {
            background-color: #7c3aed;
            border-color: #7c3aed;
        }
        
        .signup-form {
            display: none;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleForm() {
            const loginForm = document.querySelector('.login-form');
            const signupForm = document.querySelector('.signup-form');

            if (window.getComputedStyle(loginForm).display !== 'none') {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            } else {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            }
        }

        function handleSubmit(event, isLogin) {
            event.preventDefault();

            const form = event.target;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);
            formData.append('action', isLogin ? 'login' : 'signup');

            // Disable submit button and show loading spinner
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const toastEl = document.getElementById('toastMessage');
                const toastBody = toastEl.querySelector('.toast-body');
                const toast = new bootstrap.Toast(toastEl);

                if (data.status === 'success') {
                    toastBody.textContent = data.message;
                    toastEl.classList.remove('bg-danger');
                    toastEl.classList.add('bg-success');
                    toast.show();

                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    toastBody.textContent = data.message;
                    toastEl.classList.remove('bg-success');
                    toastEl.classList.add('bg-danger');
                    toast.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.innerHTML = isLogin ? 'Sign In' : 'Create Account';
            });
        }
    </script>
</head>
<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
        <div class="glass-card p-4 p-md-5 w-100" style="max-width: 440px;">
            <!-- Login Form -->
            <div class="login-form">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold gradient-text">Welcome Back!</h1>
                    <p class="text-muted">Enter your credentials to access your account</p>
                </div>

                <form onsubmit="handleSubmit(event, true)" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

                <div class="text-center mt-4">
                    <button onclick="toggleForm()" class="btn btn-link text-decoration-none">
                        Don't have an account? Sign up
                    </button>
                </div>
            </div>

            <!-- Signup Form -->
            <div class="signup-form">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold gradient-text">Create Account</h1>
                    <p class="text-muted">Fill in your information to get started</p>
                </div>

                <form onsubmit="handleSubmit(event, false)" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="signupName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="signupName" name="name" placeholder="John Doe" required>
                    </div>

                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="signupEmail" name="email" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Account</button>
                </form>

                <div class="text-center mt-4">
                    <button onclick="toggleForm()" class="btn btn-link text-decoration-none">
                        Already have an account? Sign in
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container">
        <div id="toastMessage" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
</body>
</html>