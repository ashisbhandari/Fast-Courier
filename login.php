<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/fastlogo.png">
    <title>Fast Courier Login</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            width: 400px;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: #6a1b9a;
            font-size: 26px;
            margin-bottom: 1rem;
        }
        h2 {
            color: #333;
            margin-bottom: 2rem;
            font-size: 18px;
        }
        label {
            font-size: 15px;
            color: #5c6bc0;
            display: block;
            text-align: left;
            margin: 1.2rem 0 0.3rem;
            font-weight: bold;
        }
        .input-group {
            position: relative;
            width: 100%;
        }
        .input-field {
            width: 100%;
            padding: 12px;
            padding-right: 40px; /* Space for key icon */
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #6a1b9a;
        }
        .btn-login {
            background-color: #6a1b9a;
            color: #fff;
            padding: 12px;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .btn-login:hover {
            background-color: #8e24aa;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 1rem 0;
            font-size: 14px;
            color: #555;
        }
        .forgot-password {
            color: #6a1b9a;
            font-size: 14px;
            text-decoration: none;
            margin-top: 1rem;
            display: inline-block;
        }
        .forgot-password:hover {
            color: #8e24aa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Fast Courier and Cargo Service</h1>
        <h2>Log Into Fast Courier</h2>
        <form action="uservalidate.php" method="post" onsubmit="saveUsername()">
            <label for="username">Enter Username</label>
            <input type="text" id="username" name="name" required class="input-field" placeholder="Enter username or company name">
            
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" id="password" name="password" required class="input-field" placeholder="Password">
                <i class="bi bi-key-fill toggle-password" onclick="togglePassword('password')"></i>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="remember-me">
                <label for="remember-me" style="margin-left: 0.5rem;">Remember me</label>
            </div>
            
            <button type="submit" class="btn-login">LOGIN</button>
            <a href="contact.php" class="forgot-password">Forgot your password?</a>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            let field = document.getElementById(fieldId);
            field.type = field.type === "password" ? "text" : "password";
        }

        // Function to load saved username if "Remember Me" was checked
        window.onload = function() {
            const savedUsername = localStorage.getItem('username');
            if (savedUsername) {
                document.getElementById('username').value = savedUsername;
                document.getElementById('remember-me').checked = true;
            }
        };

        // Function to save username when form is submitted if "Remember Me" is checked
        function saveUsername() {
            const rememberMe = document.getElementById('remember-me').checked;
            const username = document.getElementById('username').value;
            if (rememberMe) {
                localStorage.setItem('username', username);
            } else {
                localStorage.removeItem('username');
            }
        }
    </script>
</body>
</html>
