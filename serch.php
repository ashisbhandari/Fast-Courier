<?php
$conn = mysqli_connect("localhost", "root", "", "fastbtm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables to store user input
$searchReceiverName = "";
$searchSenderName = "";
$searchBookingDate = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
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
    .track{
      padding-top: 3%;
      text-align:center;
    }
     .carousel-item {
            position: relative;
        }
        
        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel-caption {
        position: absolute;
        top: 0;
        left: 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    img{
      height:fit-content;
    }
    .search{
      margin-left: 35%;
      margin-top: 20%;
      max-width: 50%;
      height: 20px;
      
      /* background-color: green; */
      
    }
    .btn-color {
        background-color: #007bff; 
        border: none; 
    }

    .btn-color:hover {
        background-color: #0056b3; 
    } 
    .left{
      position: absolute;
        top: 0;
        left: 100;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    .time{
      margin-left: 60%;
      font-size:2px
      
    }
  </style>
  
</head>
<body>
<?php include 'menu-nav.php'  ?>


<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <img src="image/cargo.jpg" alt="Dhl">
  <div class="carousel-item active">
            <div class="carousel-caption">
               <?php include 'glove.php' ?>
            </div>
            <div class="time">
              <?php include 'clock.php' ?>
            </div>
            
            <div class="search">
    <div class="input-group">
      <form action="serch.php"method="post">
      <div class="input-group mb-3">
    <input class="form-control" type="search" name="tracking_number" placeholder="Enter Tracking Number" aria-label="Search">
    <div class="input-group-append">
        <input type="submit" value="Find Packet" class="btn btn-primary">
    </div>
</div>

      </form>
    </div>
</div>

        </div>
  </div>
  
  

</div>
    <br>
<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "fastbtm");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the tracking number from the form input
    $tracking_number = mysqli_real_escape_string($conn, $_POST['tracking_number']);

    // Query to fetch tracking details from listdomestic.php table
    $sql = "SELECT * FROM domesticinfo WHERE `CN No` = '$tracking_number'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table ' border='3'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>Cn No</th>
                    <th>Booking Date</th>
                    <th>Sender address</th>
                    <th>Packet Type</th>
                    <th>Receiver address</th>
                </tr>
              ";
        while ($row = mysqli_fetch_assoc($result)) {
            $color = ($row['CN No'] % 2 == 0) ? '#E7E7E7' : '#F7F7F7';
            echo "<tr style='background-color: $color;'>";
            echo "<td><a href='#?cn=" . $row['CN No'] . "'>FAST177 0" . $row['CN No'] . "</a></td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['Saddress'] . "</td>";
            echo "<td>" . $row['pactype'] . "</td>";
            echo "<td>" . $row['Raddress'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "<center><h1>Sorry or inconvinience<h1><br><p><img src='image/norecord.png'alt='No Record Found'></p><center>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
