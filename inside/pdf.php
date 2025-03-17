<?php
session_start();
// Step 1: Include FPDF library
require('/home/ashishbh/public_html/fpdf/fpdf.php');

// Function to generate PDF for a given CN number with two tables on one page
function generatePDF($conn, $cn) {
    // Initialize FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Query the database for selected CN No.
    $sql = "SELECT * FROM domesticinfo WHERE `CN No` = $cn";
    $result = mysqli_query($conn, $sql);
     $tableWidth = 160; // For example, 160 units wide for the full table
    $xStart = ($pdf->GetPageWidth() - $tableWidth) / 2; // Center alignment for X-axis
    $yStart = ($pdf->GetPageHeight() - 90) / 2; // Center alignment for Y-axis; adjust 140 based on table height

    // Fetch and display data in PDF if available
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            // Content for the first table
            $pdf->MultiCell(80, 12, "Fast Courier & Cargo Services", 'LT', 'C');
            $pdf->SetXY(80 + 10, 10);
            $pdf->MultiCell(40, 20 / 2, "PAN No:603043796\nDate:". $row['date'], 1, 'C');
            $pdf->SetXY(80 + 40 + 10, 10);
            $pdf->MultiCell(20, 20 / 2, "Origin.\nBTM", 1, 'C');
            $pdf->SetXY(80 + 10, 10);
            $pdf->MultiCell(40, 16 / 2, "", 1, 'C');
            $pdf->SetXY(80 + 40 + 10, 10); 
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell(40, 20 / 2, "Dest.\n ".$row['Destination'], 1, 'R');
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetXY(80 + 40 + 10, 10);
            $pdf->Cell(00, 8, "CN:", 1, 1, 'R');
            $pdf->Cell(80, 7, "023-534177,9801376348", 'L', 0, 'C');
            $pdf->Cell(0, 7, "FAST177 0" . $row['CN No'], 'R', 1, 'R');
            $pdf->Cell(80, 5, "Birtamode,jhapa", 'LB', 0, 'C');
            $pdf->Cell(0, 5, "", 'LRB', 1);
            $pdf->Cell(80, 3, "", 'LR', 0, 'C');
            $pdf->Cell(0, 3, "", 'LR', 1, 'C');
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
            $pdf->Cell(40, 8, $row['Payments'].'  '.$row['price'], 1, 0, 'C');
            $pdf->Cell(0, 8, "Name:.................................", 'LR', 1);
            $pdf->Cell(120, 8, "Please don't put cash in Envelope.", 'L', 0, 'C');
            $pdf->Cell(0, 8, "Sign:.................................", 'LR', 1);
            $pdf->Cell(120, 8, "Booked by: " . $row['Bookby'], 'LB', 0, 'C');
            $pdf->Cell(0, 8, "Date:................... Stamp..............", 'LRB', 1);
            $pdf->Cell(0, 10, "Thank You For Using Fast Courier & Cargo Service", 0, 1, 'C');


        }
    }

    // Output PDF
    $pdf->Output();
}

// Step 2: Check if CN No. is provided via GET and call the function
if (isset($_GET['cn'])) {
    $cn = $_GET['cn'];

    // Step 3: Establish database connection
    $conn = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

    // Check connection
    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        exit();
    }

    // Call the function to generate the PDF
    generatePDF($conn, $cn);
    
    // Close the database connection
    mysqli_close($conn);
} else {
    echo "CN No. not specified.";
}
?>
