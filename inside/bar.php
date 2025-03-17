<?php
require '/home/ashishbh/public_html/inside/vendor/autoload.php'; // Include Composer's autoload to load the library

// Database connection
$conn = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if CN is set
if (isset($_GET['cn'])) {
    $cn = $_GET['cn'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM domesticinfo WHERE `CN No` = ?");
    $stmt->bind_param("s", $cn); // Assuming CN No is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found for CN No: $cn";
        exit;
    }
} else {
    echo "No CN No specified";
    exit;
}

// Generate Barcode
use Picqer\Barcode\BarcodeGeneratorHTML;
$data = 'FAST177 0' . $row['CN No'];
$generatorHTML = new BarcodeGeneratorHTML();
echo $generatorHTML->getBarcode($data, $generatorHTML::TYPE_CODE_128);

// Close the database connection
$conn->close();
?>
