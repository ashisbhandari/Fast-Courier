<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "fastbtm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get CN No values from query string
$cnNumbers = isset($_GET['cn_numbers']) ? $_GET['cn_numbers'] : '';

if (!empty($cnNumbers)) {
    // Sanitize input
    $cnNumbers = mysqli_real_escape_string($conn, $cnNumbers);

    // Construct the SQL query to fetch selected items
    $sql = "SELECT * FROM domesticinfo WHERE `CN No` IN (" . implode(',', array_map(function($cn) use ($conn) {
        return "'" . mysqli_real_escape_string($conn, $cn) . "'";
    }, explode(',', $cnNumbers))) . ")";

    // Execute the query
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Invoice</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CN No</th>
                    <th>Booking Date</th>
                    <th>Sender Name</th>
                    <th>Sender Address</th>
                    <th>Sender Contact</th>
                    <th>Packet Type</th>
                    <th>Quantity</th>
                    <th>Receiver Name</th>
                    <th>Receiver Address</th>
                    <th>Receiver Contact</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>FAST177 0" . htmlspecialchars($row['CN No']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Sname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Saddress']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Snumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pactype']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pieces']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Rname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Raddress']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Rnumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
