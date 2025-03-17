<?php
session_start(); // Start the session

// Database connection
$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $user = $_POST['name'];
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("SELECT password FROM signup WHERE name=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedPassword);
        $stmt->fetch();

        // Verify the hashed password
        if (password_verify($password, $storedPassword)) {
            // Password is correct
            $_SESSION['username'] = $user; // Store username in session
            header('Location: inside/listDomestic.php');
            exit();
        } else {
            // Incorrect password
            header("Location: wrong.php");
            exit();
        }
    } else {
        // User not found
        header("Location: wrong.php");
        exit();
    }

    $stmt->close();
} else {
    echo "No POST request received.";
}

mysqli_close($con);
?>
