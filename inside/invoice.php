<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Courier Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        table {
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .icon-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 20px;
        }

        .icon-container {
            background-color: #3b3b3b;
            padding: 10px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .icon-container i {
            color: white;
            font-size: 24px;
        }
        
        .icon-container:hover {
            background-color: #444;
        }

        @media print {
            .icon-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon-buttons">
            <div class="icon-container" id="pdfBtn">
                <i class="fas fa-file-pdf"></i>
            </div>
            <div class="icon-container" id="printBtn">
                <i class="fas fa-print"></i>
            </div>
        </div>
        <center>
            <h1>Fast Courier and Cargo Service</h1>
            <h2>Birtamode, Jhapa</h2>
            <hr>
        </center>
        <br>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>CN No</th>
                    <th>Booking Date</th>
                    <th>Sender Name</th>
                    <th>Packet Type</th>
                    <th>Quantity</th>
                    <th>COD</th>
                    <th>Receiver Name</th>
                    <th>Receiver Address</th>
                    <th>Receiver Contact</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $conn = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

                // Check connection
                if (!$conn) {
                    error_log("Connection failed: " . mysqli_connect_error()); // Log the error
                    echo "<tr><td colspan='10'>Unable to retrieve records at the moment.</td></tr>"; // User-friendly message
                    exit; // Stop execution
                }

                // Get the CN No values from the query string
                if (isset($_GET['items'])) {
                    $cnNos = explode(',', $_GET['items']);
                    $placeholders = implode(',', array_fill(0, count($cnNos), '?'));
                    $sql = "SELECT * FROM domesticinfo WHERE `CN No` IN ($placeholders)";
                    
                    // Prepare and execute the query
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, str_repeat('s', count($cnNos)), ...$cnNos); // Change to 's' for strings
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    // Fetch and display the results
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>FAST177 0" . htmlspecialchars($row['CN No']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Sname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Pactype']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['pieces']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['COD']) . "</td>"; // Assuming 'COD' is the column name in your database
                            echo "<td>" . htmlspecialchars($row['Rname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Raddress']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Rnumber']) . "</td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found</td></tr>";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.9/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.getElementById('pdfBtn').addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const table = document.querySelector('table');
            const rows = Array.from(table.querySelectorAll('tr')).map(row => 
                Array.from(row.querySelectorAll('td, th')).map(cell => cell.innerText)
            );

            // Add the title to the PDF, centered
            const title = "Fast Courier and Cargo Service";
            const subtitle = "Birtamode, Jhapa";
            const pageWidth = doc.internal.pageSize.width;

            doc.setFontSize(18);
            doc.text(title, pageWidth / 2, 20, { align: 'center' });
            doc.setFontSize(14);
            doc.text(subtitle, pageWidth / 2, 30, { align: 'center' });

            // Create the table in the PDF
            doc.autoTable({
                startY: 40, // Start below the title and subtitle
                head: [rows[0]], // table headers
                body: rows.slice(1), // table rows
                margin: { horizontal: 10 },
                styles: { fontSize: 8 }
            });

            // Save the PDF
            doc.save('invoice.pdf');
        });

        document.getElementById('printBtn').addEventListener('click', () => {
            window.print();
        });
    </script>
</body>
</html>
