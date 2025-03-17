<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set the sender's email (use a valid domain)
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
