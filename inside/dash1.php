<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch total shipments, cash shipments, and COD/credit shipments
$totalShipmentsQuery = "SELECT COUNT(`CN No`) AS total FROM domesticinfo";
$totalCashQuery = "SELECT COUNT(`CN No`) AS totalCash FROM domesticinfo WHERE payments = 'Cash'";
$totalCODQuery = "SELECT COUNT(`CN No`) AS totalCOD FROM domesticinfo WHERE payments IN ('COD', 'Credit')";

$totalShipments = mysqli_fetch_assoc(mysqli_query($conn, $totalShipmentsQuery))['total'];
$totalCash = mysqli_fetch_assoc(mysqli_query($conn, $totalCashQuery))['totalCash'];
$totalCOD = mysqli_fetch_assoc(mysqli_query($conn, $totalCODQuery))['totalCOD'];

// Initialize variables for search filters
$searchSenderName = $searchStartDate = $searchEndDate = "";

// Pagination variables
$recordsPerPage = 5;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Process search form if POST request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchSenderName = mysqli_real_escape_string($conn, $_POST['Sname']);
    $searchStartDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $searchEndDate = mysqli_real_escape_string($conn, $_POST['endDate']);
}

// Construct dynamic SQL query based on user inputs
$sql = "SELECT * FROM domesticinfo WHERE 1";
$params = [];

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

$sql .= " ORDER BY `CN No` DESC LIMIT $offset, $recordsPerPage";

// Prepare the statement and bind parameters
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Count total records for pagination
$countQuery = "SELECT COUNT(`CN No`) AS total FROM domesticinfo WHERE 1";
if (!empty($searchSenderName)) {
    $countQuery .= " AND Sname LIKE ?";
    $params[] = '%' . $searchSenderName . '%';
}
if (!empty($searchStartDate) || !empty($searchEndDate)) {
    if (!empty($searchStartDate) && !empty($searchEndDate)) {
        $countQuery .= " AND date BETWEEN ? AND ?";
        $params[] = $searchStartDate;
        $params[] = $searchEndDate;
    } elseif (!empty($searchStartDate)) {
        $countQuery .= " AND date >= ?";
        $params[] = $searchStartDate;
    } elseif (!empty($searchEndDate)) {
        $countQuery .= " AND date <= ?";
        $params[] = $searchEndDate;
    }
}

$countStmt = $conn->prepare($countQuery);

if (!empty($params)) {
    $countStmt->bind_param(str_repeat('s', count($params)), ...$params);
}

$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRecords = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fast Courier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e0f0f1;
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination button {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .pagination button.active {
            background-color: #007bff;
            color: white;
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
        </div>

        <form action="listDomestic.php" method="post" class="search-form">
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
                <input type="submit" value="Search" class="btn btn-danger" style="width:100px">
                <a href="listDomestic.php" class="btn btn-info">Refresh</a>
            </div>
        </form>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="domestic.php">
                <button type="button" class="btn btn-info">Create Order</button>
            </a>
            <input class="form-control w-50" id="myInput" type="text" placeholder="Search..">
        </div>

        <div id="Booked_items" class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Select <input type="checkbox" id="selectAll" onclick="toggleSelectAll()"></th>
                        <th>CN No</th>
                        <th>Booking Date</th>
                        <th>Sender Name</th>
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
                                <td><input type="checkbox" class="items" data-cn="<?php echo $row['CN No']; ?>"></td>
                                <td><a href="pdf.php?cn=<?php echo $row['CN No']; ?>" target="_blank">FAST177 0<?php echo $row['CN No']; ?></a></td>
                                <td><a href="bankpod.php?cn=<?php echo $row['CN No']; ?>" target="_blank"><?php echo $row['date']; ?></a></td>
                                <td><?php echo htmlspecialchars($row['Sname']); ?></td>
                                <td><?php echo htmlspecialchars($row['Snumber']); ?></td>
                                <td><?php echo htmlspecialchars($row['Pactype']); ?></td>
                                <td><center><?php echo htmlspecialchars($row['pieces']); ?></center></td>
                                <td><?php echo htmlspecialchars($row['Rname']); ?></td>
                                <td><?php echo htmlspecialchars($row['Raddress']); ?></td>
                                <td><?php echo htmlspecialchars($row['Rnumber']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <center><a href="Edit.php?cn=<?php echo $row['CN No']; ?>&date=<?php echo $row['date']; ?>">Edit</a><br></center>
                                        <center><a href="delete.php?cn=<?php echo $row['CN No']; ?>">Delete <img src="image/delete.png" width="20" height="18"></a></center>
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

        <div class="pagination">
            <?php
            if ($page > 1) {
                echo "<button onclick='window.location.href=\"listDomestic.php?page=" . ($page - 1) . "\"'>Previous</button>";
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = $i === $page ? 'active' : '';
                echo "<button class='$activeClass' onclick='window.location.href=\"listDomestic.php?page=$i\"'>$i</button>";
            }
            if ($page < $totalPages) {
                echo "<button onclick='window.location.href=\"listDomestic.php?page=" . ($page + 1) . "\"'>Next</button>";
            }
            ?>
        </div>
    </div>

    <script>
        // Search functionality
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#Booked_items tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        // Select all checkbox toggle
        function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.items');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

        // Handle logout confirmation
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = "https://www.ashishbhandari431.com.np/?logout=true";
            }
        }
    </script>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
