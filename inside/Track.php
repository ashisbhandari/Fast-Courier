
<?php
 
$conn= mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

// Initialize variables to store user input
$searchReceiverName = "";
$searchSenderName = "";
$searchBookingDate = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fast Courier</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <style>
     td {
            padding: 2px;
            height: 70PX;
        }
    .table-bordered{
        border: 3;
    }
  </style>
  
</head>
<body>
    <?php include 'nav.php'; ?>
    <br>
    <form action="Search.php" method="post">
        <label>Receiver name</label>
        <input type="text" name="Rname" value="<?php echo htmlspecialchars($searchReceiverName); ?>">
        &emsp14;
        <label>Sender Name:</label>
        <input type="text" name="Sname" value="<?php echo htmlspecialchars($searchSenderName); ?>">
        &emsp13;
        <label>Booking Date:</label>
        <input type="text" id="btn" name="Date" value="<?php echo htmlspecialchars($searchBookingDate); ?>">
        &emsp14;
        <input type="submit" value="Search" class="btn btn-danger">
    </form>
    <a href="domestic.php">
        <button type="button" class="btn btn-primary">Add Docket</button>
    </a>&emsp14;
    <a href="listDomestic.php">
        <button type="button" class="btn btn-primary">Refresh</button>
    </a>
    <br>

<?php

// Database connection
 
$conn= mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the tracking number from the form input
    $tracking_number = mysqli_real_escape_string($conn, $_POST['tracking_number']);

    // Query to fetch tracking details from listdomestic.php table
    $sql = "SELECT * FROM domesticinfo WHERE `CN No` = '$tracking_number'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>Cn No</th>
                    <th>Booking Date</th>
                    <th>Sender name</th>
                    <th>Sender address</th>
                    <th>Sender Contact</th>
                    <th>Packet Type</th>
                    <th>Quantity</th>
                    <th>Receiver name</th>
                    <th>Receiver address</th>
                    <th>Receiver Contact</th>
                    
                    <th>Edit</th>
                </tr>
              </thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            $color = ($row['CN No'] % 2 == 0) ? '#E7E7E7' : '#F7F7F7';
            echo "<tr style='background-color: $color;'>";
            echo "<td><a href='pdf.php?cn=" . $row['CN No'] . "' target=_blank'>FAST177 0" . $row['CN No'] . "</a></td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['Sname'] . "</td>";
            echo "<td>" . $row['Saddress'] . "</td>";
            echo "<td>" . $row['Snumber'] . "</td>";
            echo "<td>" . $row['Pactype'] . "</td>";
            echo "<td><center>" . $row['pieces'] . "</center></td>";
            echo "<td>" . $row['Rname'] . "</td>";
            echo "<td>" . $row['Raddress'] . "</td>";
            echo "<td>" . $row['Rnumber'] . "</td>";
            echo "<td><a href='edit.php?cn=" . $row['CN No'] . "&date=" . $row['date'] . "&sadd=" . $row['Saddress'] . "&price=" . $row['price'] . "&weight=" . $row['weight'] . "&pic=" . $row['pieces'] . "&sn=" . $row['Sname'] . "&sno=" . $row['Snumber'] . "&rn=" . $row['Rname'] . "&rno=" . $row['Rnumber'] . "&radd=" . $row['Raddress'] . "&name=" . $row['Bookby'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "<p>No tracking information found for the given tracking number.</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
