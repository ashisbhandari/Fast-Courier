<?php
include '/home/ashishbh/public_html/auth.php';
checkLogin(); // Check if user is logged in

$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991");
if ($con) {
    // Connection successful message can be removed in production
    // echo "Connection Successful"; 
} else {
    die("Connection failed: " . mysqli_connect_error()); // Die with an error message
}
mysqli_select_db($con, "ashishbh_fastbtm");

// Retrieve and sanitize POST data
$Sname = mysqli_real_escape_string($con, $_POST['Sname']);
$Snumber = mysqli_real_escape_string($con, $_POST['Snumber']);
$Saddress1 = mysqli_real_escape_string($con, $_POST['Saddress']);
$Saddress2 = mysqli_real_escape_string($con, $_POST['Saddress1']);
$Saddress = "$Saddress1 $Saddress2";
$pactype = mysqli_real_escape_string($con, $_POST['pactype']);
$pieces = mysqli_real_escape_string($con, $_POST['pieces']);
$weight = mysqli_real_escape_string($con, $_POST['weight']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$Rname = mysqli_real_escape_string($con, $_POST['Rname']);
$Rnumber = mysqli_real_escape_string($con, $_POST['Rnumber']);
$Raddress = mysqli_real_escape_string($con, $_POST['Raddress']);
$Raddress1 = mysqli_real_escape_string($con, $_POST['Raddress1']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$name = mysqli_real_escape_string($con, $_POST['Bookby']);
$address = "$Raddress $Raddress1";
$dest = mysqli_real_escape_string($con, $_POST['district']);
$payment = mysqli_real_escape_string($con, $_POST['payments']);

// Insert query
$query = "INSERT INTO domesticinfo (Sname, Snumber, Saddress, pactype, pieces, Rname, Rnumber, Raddress, date, weight, price, Bookby, Destination,payments) 
VALUES ('$Sname', '$Snumber', '$Saddress', '$pactype', '$pieces', '$Rname', '$Rnumber', '$address', '$date', '$weight', '$price', '$name', '$dest','$payment')";

// Execute the query
if (mysqli_query($con, $query)) {
    // Get the last inserted CN No (assuming it's the primary key or has auto-increment)
    $cn_no = mysqli_insert_id($con); // Retrieve the last inserted ID

    // Redirect to the Edit page with the newly created record's details
    header("Location: Edit.php?cn=" . urlencode($cn_no) . 
                  "&date=" . urlencode($date) . 
                  "&sadd=" . urlencode($Saddress) . 
                  "&price=" . urlencode($price) . 
                  "&weight=" . urlencode($weight) . 
                  "&pic=" . urlencode($pieces) . 
                  "&sn=" . urlencode($Sname) . 
                  "&sno=" . urlencode($Snumber) . 
                  "&rn=" . urlencode($Rname) . 
                  "&rno=" . urlencode($Rnumber) . 
                  "&radd=" . urlencode($address) . 
                  "&Book=" . urlencode($name));
    exit; // Stop further execution after redirection
} else {
    echo "Error inserting record: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
