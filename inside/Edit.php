<?php
// Database connection
$con = mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve CN No. from the URL
if (isset($_GET['cn'])) {
    $cn = $_GET['cn'];

    // Query the database for selected CN No.
    $stmt = $con->prepare("SELECT * FROM domesticinfo WHERE `CN No` = ?");
    $stmt->bind_param("s", $cn);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No record found for CN No: $cn";
        exit;
    }
} else {
    echo "No CN No specified";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Fast Courier</title>
    <style>
        body {
            overflow-y: scroll; /* Add scrollbar on the right side */
            overflow-x: hidden; /* Hide scrollbar at the bottom */
        }
        body {
            background-color: #e0f0f1; /* Updated background color */
            font-family: 'Josefin Sans', sans-serif;
        }
        .sticky-button-container {
            position: sticky;
            top: 0;
            background-color: white;
            padding: 10px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
        }
        .show {
            display: block; /* Show when scrolled */
        }
        .btn-submit-container {
            overflow: hidden; /* Remove scrollbar for button container */
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <!-- Sticky Button Container -->
    <div class="sticky-button-container" id="stickyButtons">
        <a href="bankpod.php?cn=<?php echo htmlspecialchars($row['CN No']); ?>" target="_blank">
            <button type="button" class="btn btn-light"> &#x1F5A8; Bank</button>
        </a>
        <a href="pdf.php?cn=<?php echo $row['CN No']; ?>" target="_blank">
            <button type="button" class="btn btn-light"> &#x1F5A8; Customer</button>
        </a>
        <a href="domestic.php">
            <button type="button" class="btn btn-success">Add Docket</button>
        </a>
        <a href="listDomestic.php">
            <button type="button" class="btn btn-success">View Docs</button>
        </a>
    </div>

    <center>
        <form action="editinfo.php" method="post">
            <div class="col">
                <h4 class="text-center">Fast Courier and Cargo Services<br>Birtamode, Jhapa<br>023-534177, 9801376348</h4>
               
                <div class="row">
                                <!-- CN NO -->
                    <div class="col-md-3 col-12">
                        <label for="cn">CN NO:</label>
                        <p>Fast177 <span id="cn">00<?php echo$row['CN No'];?></span></p>
                        <input type="hidden" name="CN_No" value="<?php echo $row['CN No']; ?>" class="z2">
                    </div>
                    <div class="col-md-3 col-12">
                        <label style="color: red;" for="district" style="width: 180px;">Destination</label>
                        <input type="text" style="border: none;width:180px" class="form-control" name="destination" readonly value="<?php echo $row['Destination']; ?>" required>
                    </div>
                    
                    <div class="col-md-3 col-12">
                        <label style="color: red; width: 220px;">Choose Packet Type:</label>
                        <select class="form-control" name="pactype" required style="width: 180px;">
                            <option value="">--None--</option>
                            <option value="Document" <?php if ($row['Pactype'] == 'Document') echo 'selected'; ?>>Document</option>
                            <option value="Parcel" <?php if ($row['Pactype'] == 'Parcel') echo 'selected'; ?>>Parcel</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-12">
                        <label>Booking Date:</label>
                        <input class="form-control " style="width: 180px;"  type="text" name="date" id="realDateTextBox" value="<?php echo $row['date']; ?>" readonly>
                    </div>
                </div>
                        
                <hr>
                <br>
                <h3>Sender Details</h3>
                <div class="form-group">
                    <label style="color: red;">Name:</label>
                    <input type="text" value="<?php echo $_GET['sn']; ?>" class="form-control" placeholder="Sender name" name="Sname" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Phone number:</label>
                    <input type="tel" value="<?php echo $_GET['sno']; ?>" class="form-control" placeholder="Sender number" name="Snumber" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Address line 1:</label>
                    <input type="text" value="<?php echo $_GET['sadd']; ?>" class="form-control" placeholder="Sender Address" name="Saddress" required>
                </div>
                <div class="form-group">
                    <label>Address line 2:</label>
                    <input type="text" class="form-control" placeholder="Sender Address" name="Saddress1">
                </div>
            </div>
            <hr>
            <div class="col">
                <h3>Receiver Details</h3>
                <div class="form-group">
                    <label style="color: red;">Name:</label>
                    <input type="text" value="<?php echo $_GET['rn']; ?>" class="form-control" placeholder="Receiver name" name="Rname" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Phone number:</label>
                    <input type="tel" value="<?php echo $_GET['rno']; ?>" class="form-control" placeholder="Receiver number" name="Rnumber" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Address line 1:</label>
                    <input type="text" value="<?php echo $_GET['radd']; ?>" class="form-control" placeholder="Receiver Address" name="Raddress" required>
                </div>
                <div class="form-group">
                    <label>Address line 2:</label>
                    <input type="text" class="form-control" placeholder="Receiver Address" name="Raddress1">
                </div>
                <!--<div class="form-row mb-4">-->
                    
                <!--    <div class="form-group col-md-3">-->
                <!--        <label style="color: red;" for="payments">Payments</label>-->
                <!--        <input type="text" style="border: none; width:150px" class="form-control" name="payments" value="<?php //echo $row['payments']; ?>" required>-->
                        <!--<select name="payments" id="payments" class="form-control">-->
                        <!--    <option value="Cash"<?php //if ($row['payments'] == 'Cash') echo 'selected'; ?>>Cash</option>-->
                        <!--    <option value="COD"  //<?php// if ($row['payments'] == 'COD') echo 'selected'; ?>>COD</option>-->
                        <!--</select>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-3">-->
                <!--        <label style="color: red;">Total Valuation (RS):</label>-->
                <!--        <input class="form-control" type="text" name="price" value="<?php// echo $_GET['price']; ?>" required>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-3">-->
                <!--        <label>Weight (in KG*):</label>-->
                <!--        <input type="number" class="form-control" name="weight" value="<?//php echo $_GET['weight']; ?>" required>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-3">-->
                <!--        <label>Pieces:</label>-->
                <!--        <input type="number" class="form-control" name="pieces" value="<?//php echo $_GET['pic']; ?>" required>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-3">-->
                <!--        <label>Booked By:</label>-->
                <!--        <input class="form-control" type="text" name="Bookby" value="<?php// echo $_GET['Book']; ?>" required>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-row mb-4">
    <div class="form-group col-md-2 col-12">
        <label style="color: red;" for="payments">Payments</label>
        <input type="text" style="border: none; width:150px" class="form-control" name="payments" value="<?php echo $row['Payments']; ?>" required readonly>
    </div>
    <div class="form-group col-md-2 col-12">
        <label style="color: red;">Total Valuation (RS):</label>
        <input class="form-control" style="width: 180px;" type="text" name="price" value="<?php echo $_GET['price']; ?>" required>
    </div>
    <div class="form-group col-md-2 col-12">
        <label>Weight (in KG*):</label>
        <input type="number" style="width: 180px;" class="form-control" name="weight" value="<?php echo $_GET['weight']; ?>" required>
    </div>
    <div class="form-group col-md-2 col-12">
        <label>Pieces:</label>
        <input type="number" style="width: 180px;" class="form-control" name="pieces" value="<?php echo $_GET['pic']; ?>" required>
    </div>
    <div class="form-group col-md-2 col-12">
        <label>Booked By:</label>
        <input class="form-control" style="width: 180px;" type="text" name="Bookby" value="<?php echo $_GET['Book']; ?>" required>
    </div>
</div>

            </div>
            <center class="btn-submit-container">
                <button type="submit" class="btn btn-success btn-sm btn-block">Update</button>
            </center>
        </form>
    </center>
    <br><br><br>

    <script>
        // Show sticky button when scrolling down
        window.onscroll = function() {
            const stickyButtons = document.getElementById("stickyButtons");
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                stickyButtons.classList.add("show");
            } else {
                stickyButtons.classList.remove("show");
            }
        };
    </script>
</body>
</html>
