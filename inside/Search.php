<?php
session_start();
$conn = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch Total Shipments
$totalShipmentsQuery = "SELECT COUNT(`CN No`) as total FROM domesticinfo";
$totalShipmentsResult = $conn->query($totalShipmentsQuery);
$totalShipments = $totalShipmentsResult->fetch_assoc()['total'];

$totalCashQuery = "SELECT COUNT(`CN No`) as totalCash FROM domesticinfo where payments='Cash'";
$totalCashResult = $conn->query($totalCashQuery);
$totalCash = $totalCashResult->fetch_assoc()['totalCash'];

$totalCODQuery = "SELECT COUNT(`CN No`) as totalCOD FROM domesticinfo where payments='COD'";
$totalCODResult = $conn->query($totalCODQuery);
$totalCOD = $totalCODResult->fetch_assoc()['totalCOD'];

// Fetch Records
$sql = "SELECT * FROM domesticinfo ORDER BY `CN No` DESC";
$result = $conn->query($sql);
// Initialize variables to store user input
$searchReceiverName = "";
$searchSenderName = "";
$searchStartDate = "";
$searchEndDate = "";

// Check if form is submitted and process user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $searchSenderName = mysqli_real_escape_string($conn, $_POST['Sname']);
    $searchStartDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $searchEndDate = mysqli_real_escape_string($conn, $_POST['endDate']);
}

// Construct the SQL query using prepared statements
$sql = "SELECT * FROM domesticinfo WHERE 1";
$params = [];

if (!empty($searchReceiverName)) {
    $sql .= " AND Rname LIKE ?";
    $params[] = '%' . $searchReceiverName . '%';
}

if (!empty($searchSenderName)) {
    $sql .= " AND Sname LIKE ?";
    $params[] = '%' . $searchSenderName . '%';
}

if (!empty($searchStartDate) || !empty($searchEndDate)) {
    if (!empty($searchStartDate) && !empty($searchEndDate)) {
        $sql .= " AND date BETWEEN ? AND ?";
        $params[] = $searchStartDate;
        $params[] = $searchEndDate;
    } elseif (!empty($searchStartDate)) {
        $sql .= " AND date >= ?";
        $params[] = $searchStartDate;
    } elseif (!empty($searchEndDate)) {
        $sql .= " AND date <= ?";
        $params[] = $searchEndDate;
    }
}

// Add ORDER BY clause to sort by CN No in descending order
$sql .= " ORDER BY `CN No` DESC";

// Prepare and execute statement
$stmt = $conn->prepare($sql);

// Bind parameters dynamically
if (!empty($params)) {
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fast Courier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e0f0f1; /* Updated background color */
            font-family: 'Josefin Sans', sans-serif;
        }
        .total {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .t {
            margin-top: 10px;
            width: 250px;
            height: 150px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .t:hover {
            transform: scale(1.1);
            background-color: #f0f0f0;
        }
        .t h3 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .t p {
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    <br>
    <div class="container">
        <div class="total">
            <div class="t">
                <h3>Total Shipments</h3><br>
                <h1><?php echo $totalShipments; ?></h1>
            </div>
            <div class="t">
                <h3>Cash Shipments</h3>
                <h1><?php echo $totalCash; ?></h1>
            </div>
            <div class="t">
                <h3>Credit Shipments/ COD</h3>
                <h1><?php echo $totalCOD; ?></h1>
            </div>
            <div class="t">
                <h3>Manifest List</h3>
                <p>How are you</p>
            </div>
        </div>

        <form action="Search.php" method="post" class="search-form">
        <div class="form-row mb-4">
            <div class="form-group col-md-2 col-12">
                <label for="Sname">Sender Name:</label>
                <input class="form-control" type="text" id="Sname" name="Sname" value="<?php echo htmlspecialchars($searchSenderName); ?>">
            </div>
            <div class="form-group col-md-2 col-12">
                <label for="startDate">Start Date:</label>
                <input class="form-control" type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($searchStartDate); ?>">
            </div>
            <div class="form-group col-md-2 col-12">
                <label for="endDate">End Date:</label>
                <input class="form-control" type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($searchEndDate); ?>">
            </div>
        
            &emsp;&emsp;<input type="submit" value="Search" class="btn btn-danger" style="width:100px">
        
        </div>
        </form>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="domestic.php">
                <button type="button" class="btn btn-info">Create Order</button>
            </a>
            <input class="form-control w-50" id="myInput" type="text" placeholder="Search..">
        </div>
        <a href="#" onclick="displayInvoice()">
            <button type="button" class="btn btn-primary">Invoice</button>
        </a>
        <a href="#" onclick="displayBills()">
            <button type="button" class="btn btn-primary">Bill</button>
        </a>
        <a href="#" onclick="logout()" id="logout">
            <button type="button" class="btn btn-danger">Logout</button>
        </a>
        
        <div id="Booked_items" class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Select<input type="checkbox" id="selectAll" onclick="toggleSelectAll()"></th>
                        <th>CN No</th>
                        <th>Booking Date</th>
                        <th>Sender Name</th>
                        <!--<th>Sender Address</th>-->
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
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo"<input type='checkbox' class='items' data-cn='" . $row['CN No'] . "'>" ?></td>
                                <td><a href="pdf.php?cn=<?php echo $row['CN No']; ?>" target="_blank">FAST177 0<?php echo $row['CN No']; ?></a></td>
                                <td><a href="bankpod.php?cn=<?php echo $row['CN No']; ?>" target="_blank"><?php echo $row['date']; ?></a></td>
                                <td><?php echo htmlspecialchars($row['Sname']); ?></td>
                                <!--<td><?php echo htmlspecialchars($row['Saddress']); ?></td>-->
                                <td><?php echo htmlspecialchars($row['Snumber']); ?></td>
                                <td><?php echo htmlspecialchars($row['Pactype']); ?></td>
                                <td><center><?php echo htmlspecialchars($row['pieces']); ?></center></td>
                                <td><?php echo htmlspecialchars($row['Rname']); ?></td>
                                <td><?php echo htmlspecialchars($row['Raddress']); ?></td>
                                <td><?php echo htmlspecialchars($row['Rnumber']); ?></td>
                                <!--<td>-->
                                <!--    <a href="Edit.php?cn=<?php echo $row['CN No']; ?>&date=<?php echo $row['date']; ?>">Edit</a>-->
                                <!--    <a href="delete.php?cn=<?php echo $row['CN No']; ?>"><img src="image/delete.png" width="20" height="18"></a>-->
                                <!--</td>-->
                                <td>
                                    <!--<label for="actionDropdown">Action</label>-->
                                     <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <center><a href="Edit.php?cn=<?php echo $row['CN No']; ?>&date=<?php echo $row['date']; ?>">Edit</a><br></center>
                                        <center><a href="delete.php?cn=<?php echo $row['CN No']; ?>">Delete<img src="image/delete.png" width="20" height="18"></a></center>
                                    </div>
                                </td>
                            </tr>
                            
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" class="text-center">No results found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#Booked_items tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
      function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.items');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }
        function displayInvoice() {
            const checkboxes = document.querySelectorAll('.items');
            let selectedCNs = [];
        
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedCNs.push(checkbox.getAttribute('data-cn'));
                }
            });
        
            if (selectedCNs.length > 0) {
                const queryString = `items=${selectedCNs.join(',')}`;
                const downloadUrl = 'invoice.php?' + queryString;
                window.location.href = 'invoice.php?' + queryString;
        
                // Get the current date in YYYY-MM-DD format for the filename
                const currentDate = new Date();
                const formattedDate = currentDate.toISOString().split('T')[0]; // "YYYY-MM-DD"
                const filename = `${formattedDate}`;  // Filename with current date
        
                // Create a temporary link to trigger the download
                const link = document.createElement('a');
                link.href = downloadUrl;
                link.download = filename;  // Use the formatted date in the filename
                document.body.appendChild(link);
                link.click();  // Automatically click the link to start the download
                document.body.removeChild(link);  // Clean up the link
            } else {
                alert('No items selected!');
            }
        }
        
            function displayBills() {
                    const checkboxes = document.querySelectorAll('.items');
                    let selectedCNs = [];
        
                    checkboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            selectedCNs.push(checkbox.getAttribute('data-cn'));
                        }
                    });
        
                    if (selectedCNs.length > 0) {
                        const queryString = `items=${selectedCNs.join(',')}`;
                        const downloadUrl = 'bills.php?' + queryString;
                        window.location.href = 'bills.php?' + queryString;
                        
                        const link = document.createElement('a');
                link.href = downloadUrl;
                link.download = 'bills';  // Name of the file to be downloaded
                document.body.appendChild(link);
                link.click();  // Automatically click the link to start the download
                document.body.removeChild(link);
                    } else {
                        alert('No items selected!');
                    }
                }
               
        function logout() {
                if (confirm('Are you sure you want to logout?')) {
                    // Redirect to the same file with the logout parameter
                    window.location.href = "https://www.ashishbhandari431.com.np/" + "?logout=true";
                    
                }
            }
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>
