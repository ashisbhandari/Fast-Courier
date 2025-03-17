
<?php
$con = mysqli_connect("localhost", "root", "", "fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Construct the SQL query to select the user with the provided username and email
    $query = "SELECT name, email FROM signup WHERE name='$username' AND email='$email'";

    // Execute the query
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    // Check if a row with the provided username and email combination exists
    if (mysqli_num_rows($result) > 0) {
        // Generate a new random password
        $new_password =$_POST['password']; // Function to generate a random password
        $update_query = "UPDATE signup SET password='$new_password' WHERE name='$username' AND email='$email'";
        $update_result = mysqli_query($con, $update_query);
        
    } else {
        // Username and email combination doesn't exist
        echo "Invalid username/email combination.";
    }
} else {
    echo "No POST request received.";
}

mysqli_close($con);
header('location:login.php')
?>
