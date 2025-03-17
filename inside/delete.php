<?php
// Database connection
$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a CN No is provided in the URL and if the form has been submitted
if (isset($_GET['cn'])) {
    $cn = $_GET['cn'];

    // Fetch record details for confirmation
    $stmt = $con->prepare("SELECT * FROM domesticinfo WHERE `CN No` = ?");
    $stmt->bind_param("i", $cn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found for CN No: $cn";
        exit;
    }

    // If delete is confirmed
    if (isset($_POST['confirm_delete'])) {
        $delete_stmt = $con->prepare("DELETE FROM domesticinfo WHERE `CN No` = ?");
        $delete_stmt->bind_param("i", $cn);

        if ($delete_stmt->execute()) {
            // JavaScript alert for confirmation and redirect to listDomestic.php
            echo "<script>
                    alert('Record with CN No: FAST177 0$cn has been deleted successfully.');
                    window.location.href = 'listDomestic.php';
                  </script>";
        } else {
            echo "Error deleting record: " . $con->error;
        }

        // Free the prepared statements
        $delete_stmt->close();
        exit;
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    echo "No CN No specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Fast Courier</title>
</head>
<body>
    <div class="container mt-5">
        <h3>Are you sure you want to delete this record?</h3>
        <p><strong>CN No:</strong> FAST 0<?php echo htmlspecialchars($row['CN No']); ?></p>
        <p><strong>Packet Type:</strong> <?php echo htmlspecialchars($row['Pactype']); ?></p>

        <form method="post">
            <button type="submit" name="confirm_delete" class="btn btn-danger">Confirm Delete</button>
            <a href="listDomestic.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
