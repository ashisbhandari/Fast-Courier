<?php
session_start(); // Start the session

// Database connection
$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input
$user = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$password = $_POST['password'];
$about = mysqli_real_escape_string($con, $_POST['about']);

// Hash the password
$hpassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the `signup` table
$query = "INSERT INTO signup (name, email, address, password, about) VALUES ('$user', '$email', '$address', '$hpassword', '$about')";

if (mysqli_query($con, $query)) {
    // Successfully inserted the user into the signup table
    echo "User registered successfully!<br>";

    // Create a table for the user using their name
    $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $user); // Sanitize the table name to avoid invalid characters

    if (empty($tableName)) {
        die("Error: Invalid table name derived from username.");
    }

    // SQL to create a table specific to the user
    $createTableSql = "
        CREATE TABLE `$tableName` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            Sname VARCHAR(255) NOT NULL,
            Snumber VARCHAR(50) NOT NULL,
            Saddress TEXT NOT NULL,
            pactype VARCHAR(100) NOT NULL,
            pieces INT NOT NULL,
            Rname VARCHAR(255) NOT NULL,
            Rnumber VARCHAR(50) NOT NULL,
            Raddress TEXT NOT NULL,
            date DATE NOT NULL,
            weight FLOAT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            Bookby VARCHAR(255) NOT NULL,
            Dest VARCHAR(255) NOT NULL
        )";

    if (mysqli_query($con, $createTableSql)) {
        echo "Table '$tableName' created successfully!";
    } else {
        die("Error creating table: " . mysqli_error($con));
    }

    // Redirect to the index page after successful creation
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
