<?php
// Database connection settings
$servername = "localhost";
$username = "ashishbh_fastcourier";   // Database username
$password = "Ashish@1991";            // Database password
$dbname = "ashishbh_fastbtm";         // Database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize and validate input data
$user = trim(mysqli_real_escape_string($con, $_POST['user']));
$email = trim(mysqli_real_escape_string($con, $_POST['email']));
$mobile = trim(mysqli_real_escape_string($con, $_POST['mobile']));
$comment = trim(mysqli_real_escape_string($con, $_POST['comments']));

// Prepare SQL query to insert data into the database
$query = "INSERT INTO userinfodata (user, email, mobile, comment) VALUES (?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = mysqli_prepare($con, $query);

// Check if the statement is prepared correctly
if ($stmt) {
    // Bind the parameters to the SQL query (s = string, s = string, s = string, s = string)
    $stmt->bind_param("ssss", $user, $email, $mobile, $comment);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Successfully inserted data into the database

        // Send the email
        $to = "ashishbhandari380@gmail.com";  // Recipient email
        $subject = "Feedback to Fast Courier and Cargo Service";
        $message = "
        <h3>User Feedback Form Submission</h3>
        <p><strong>Username:</strong> $user</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mobile:</strong> $mobile</p>
        <p><strong>Comments:</strong>$comment</p>
        
        ";
        
        // Set headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . ",";  // Set the sender's email

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Your feedback has been sent successfully and saved.";
            // Redirect after successful submission
            header('Location: index.php');
            exit();  // Ensure the script stops after redirection
        } else {
            echo "There was an issue sending your feedback email.";
        }

    } else {
        // Handle SQL execution error
        echo "Error executing query: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Handle SQL preparation error
    echo "Error preparing statement: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
