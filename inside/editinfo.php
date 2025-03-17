<?php
// Database connection
$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the form data
    $cn_no = $_POST['CN_No'];
    $Sname = $_POST['Sname'];
    $Snumber = $_POST['Snumber'];
    $Saddress1 = $_POST['Saddress'];
    $Saddress2 = $_POST['Saddress1']; // Corrected variable naming for clarity
    $Saddress = "$Saddress1 $Saddress2"; // Concatenate address parts
    $pactype = $_POST['pactype'];
    $pieces = $_POST['pieces'];
    $weight = $_POST['weight'];
    $date = $_POST['date'];
    $Rname = $_POST['Rname'];
    $Rnumber = $_POST['Rnumber'];
    $Raddress = $_POST['Raddress'];
    $Raddress1 = $_POST['Raddress1'];
    $price = $_POST['price'];
    $name = $_POST['Bookby'];
    $address = "$Raddress $Raddress1"; // Concatenate receiver address parts

    // Update query
    $sql = "UPDATE domesticinfo 
            SET Pactype='$pactype', date='$date',
                Sname='$Sname', Snumber='$Snumber', Saddress='$Saddress', 
                Rname='$Rname', Rnumber='$Rnumber', raddress='$address', 
                price='$price', weight='$weight', pieces='$pieces', Bookby='$name' 
            WHERE `CN No`='$cn_no'";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Optionally retrieve the updated row for redirection
        $result = mysqli_query($con, "SELECT * FROM domesticinfo WHERE `CN No`='$cn_no'");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header("Location: Edit.php?cn=" . urlencode($row['CN No']) . 
                                  "&date=" . urlencode($row['date']) . 
                                  "&sadd=" . urlencode($row['Saddress']) . 
                                  "&price=" . urlencode($row['price']) . 
                                  "&weight=" . urlencode($row['weight']) . 
                                  "&pic=" . urlencode($row['pieces']) . 
                                  "&sn=" . urlencode($row['Sname']) . 
                                  "&sno=" . urlencode($row['Snumber']) . 
                                  "&rn=" . urlencode($row['Rname']) . 
                                  "&rno=" . urlencode($row['Rnumber']) . 
                                  "&radd=" . urlencode($row['Raddress']) . 
                                  "&Book=" . urlencode($row['Bookby']));
            exit; // Make sure to stop further execution after redirection
        } else {
            echo "No record found for CN No: $cn_no";
        }
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Close the connection
mysqli_close($con);
?>
