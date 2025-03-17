<?php
// Step 1: Include FPDF library
require('C:/xampp/htdocs/website/fpdf/fpdf.php');

// Step 2: Check if CN No. is provided via GET
if (isset($_GET['cn'])) {
    $cn = $_GET['cn'];

    // Step 3: Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "fastbtm");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 4: Query the database for selected CN No.
    $sql = "SELECT * FROM domesticinfo WHERE `CN No` = $cn";
    $result = mysqli_query($conn, $sql);

    // Step 5: Initialize FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Step 6: Set font
    $pdf->SetFont('Arial', '', 12);

    // Step 7: Fetch and display data in PDF
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

             // Generate QR code image
             $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=20x20&data=' . urlencode('FAST177 0' . $row['CN No']);
            // $pdf->Image($qrCodeUrl, 160, 160, 30, 30, 'PNG');
 
            // Displaying text and other elements in PDF
            $pdf->MultiCell(80, 12, "Fast Courier & Cargo Services", 'LT', 'C');
            $pdf->SetXY(80 + 10, 10);
            $pdf->MultiCell(40, 20 / 2, "Booking date:\n" . $row['date'], 1, 'C');
            $pdf->SetXY(80 + 40 + 10, 10);
            $pdf->Cell(18, 20, "BTM", 1, 0, 'C');
            $pdf->Cell(18, 20,$row['Destination'], 1, 0, 'C');
            $pdf->Cell(0, 8, "CN: FAST177 0" . $row['CN No'], 1, 1, 'C');
            $pdf->Cell(80, 7, "023-534177, 9801376348", 'L', 0, 'C');
            $pdf->Cell(0, 7,"FAST177 0". $row['CN No'], 'R', 1, 'R');

            $pdf->Cell(80, 5, "Birtamode, jhapa", 'LB', 0, 'C');
            $pdf->Cell(0, 5, "", 'LRB', 1);

            $pdf->Cell(80, 3, "", 'LR', 0, 'C');
            $pdf->Cell(0, 3, "", 'LR', 1, 'C');

            // Display QR code
            $pdf->Cell(80, 5, "Sender Details", 'LRB', 0, 'C');
            $pdf->Cell(0, 5, "Receiver Details", 'LRB', 1, 'C');
            $pdf->Cell(80, 5, $row['Sname'], 'LR', 0, 'C');
            $pdf->Cell(0, 5, $row['Rname'], 'R', 1, 'C');
            $pdf->Cell(80, 5, $row['Snumber'], 'LR', 0, 'C');
            $pdf->Cell(0, 5, $row['Rnumber'], 'R', 1, 'C');
            $pdf->Cell(80, 5, $row['Saddress'], 'LR', 0, 'C');
            $pdf->Cell(0, 5, $row['Raddress'], 'R', 1, 'C');
            $pdf->Cell(80, 5, "", 'LR', 0, 'C');
            $pdf->Cell(0, 5, "", 'R', 1, 'C');

            $pdf->Cell(40, 6, "No. Of pic.:", 1, 0, 'C');
            $pdf->Cell(40, 6, "Weight(KG):", 1, 0, 'C');
            $pdf->Cell(40, 6, "Charges:", 1, 0, 'C');
            $pdf->Cell(0, 6, "Received in goods condition", 1, 1, 'C');

            $pdf->Cell(40, 8, $row['pieces'], 1, 0, 'C');
            $pdf->Cell(40, 8, $row['weight'], 1, 0, 'C');
            $pdf->Cell(40, 8, $row['price'], 1, 0, 'C');
            $pdf->Cell(0, 8, "Name: .................................", 'LR', 1);

            $pdf->Cell(120, 8, "Please don't put cash in envelope.", 'L', 0, 'C');
            $pdf->Cell(0, 8, "Sign: .................................", 'LR', 1);

            $pdf->Cell(120, 8, "Booked by: " . $row['Bookby'], 'LB', 0, 'C');
            $pdf->Cell(0, 8, "Date: ................... Stamp..............", 'LRB', 1);

            
            $pdf->Cell(0, 10, "Thank You For Using Fast Courier & Cargo Service", 0, 1, 'C');

           
        }
    }

    // Step 8: Output PDF to browser or file
    $pdf->Output(); // 'D' for download

    // Step 9: Close database connection
    mysqli_close($conn);
} else {
    // Handle case where CN No. is not provided
    echo "CN No. not specified.";
}
?>
