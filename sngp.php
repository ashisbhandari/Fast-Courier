<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/fastlogo.png">
    <title>Fast Courier Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            width: 550px;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #6a1b9a;
        }

        .form-label {
            font-size: 15px;
            color: #5c6bc0;
            font-weight: bold;
            text-align: left;
            display: block;
        }

        .form-control {
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #6a1b9a;
            box-shadow: 0 0 5px rgba(106, 27, 154, 0.5);
            outline: none;
        }
         h1 {
                font-size: 22px;
            }

        h2 {
            font-size: 16px;
            margin-bottom: 1.5rem;
        }
        .btn-custom {
            background-color: #6a1b9a;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #8e24aa;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-link {
            margin-top: 15px;
            font-size: 15px;
        }

        .login-link a {
            color: #6a1b9a;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #8e24aa;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .btn-custom {
                font-size: 16px;
                padding: 10px;
            }
        }
         @media (max-width: 480px) {
            h1 {
                font-size: 20px;
            }

            h2 {
                font-size: 15px;
                margin-bottom: 1rem;
            }

            .btn-login {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><b>FAST COURIER AND CARGO SERVICE</b></h1>
        <h2><b>Register Into Fast Courier</b></h2>
        <form>
            <div class="mb-3">
                <label for="company-name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company-name" placeholder="Enter your company name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="owner-name" class="form-label">Owner Name</label>
                <input type="text" class="form-control" id="owner-name" placeholder="Enter owner's name" required>
            </div>

            <!-- Password Field with Key Icon -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="Create a password" required>
                    <span class="input-group-text" onclick="togglePassword('password')">
                        <i class="bi bi-key-fill"></i>
                    </span>
                </div>
            </div>

            <!-- Confirm Password Field with Key Icon -->
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm-password" placeholder="Re-enter your password" required>
                    <span class="input-group-text" onclick="togglePassword('confirm-password')">
                        <i class="bi bi-key-fill"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            let field = document.getElementById(fieldId);
            field.type = field.type === "password" ? "text" : "password";
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
