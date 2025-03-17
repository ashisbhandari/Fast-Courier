<!DOCTYPE html>
<html lang="en">
<head>
     <title>Fast Courier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <style>
        /* Fullscreen carousel for large screens */
        .carousel, .carousel-inner, .carousel-item {
            height: 80vh;
        }

        /* Fullscreen image with cover */
        .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover; /* Ensures the image fills the screen properly */
        }

        /* Center the search box */
        .search {
            position: absolute;
            top: 50%; /* Centers vertically */
            left: 50%; /* Centers horizontally */
            transform: translate(-50%, -50%); /* Adjusts position */
            width: 80%;
            max-width: 500px;
            height:20px;
            padding: 10px;
            z-index: 2; /* Ensure it is above the image */
        }

        /* Styling for time in the corner */
        .time {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 4rem;
            color: white;
            /*background: rgba(0, 0, 0, 0.5);*/
            padding: 5px 10px;
            border-radius: 5px;
            z-index: 3;
        }
        .glove{
        
            font-size: 4rem;
            color: white;
            
            align-items: left;
    }

        /* Position the fade-in text at the top center */
        .cmpname {
            position: absolute;
            top: 10%; /* Set this to adjust how far down the text should be */
            left: 50%;
            transform: translateX(-50%); /* This centers the text horizontally */
            text-align: center;
            font-size: 3rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            z-index: 2; /* Ensure it appears above the image */
            /*animation: fadeIn 2s ease-out;*/
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Footer responsiveness */
        footer .container div {
            margin-top: 10px;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .carousel, .carousel-inner, .carousel-item {
                height: 70vh;
            }
            .time {
                font-size: 3rem;
            }
            .search {
                width: 90%;
                max-width: 400px; /* Adjust for smaller screens */
            }
        }

        @media (max-width: 576px) {
            .carousel, .carousel-inner, .carousel-item {
                height: 70vh;
            }
            .search {
                width: 90%;
                max-width: 100%;
            }
        }

        /* Other custom styles */
        .btn-color {
            background-color: #007bff;
            border: none;
        }

        .btn-color:hover {
            background-color: #0056b3;
        }

        .body {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>

<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/cargo.jpg" alt="Dhl"> <!-- Image for the carousel -->
      <div class="glove">
               <?php include 'glove.php' ?>
            </div>
      <div class="time">
        <?php include 'clock.php' ?>
      </div>
      <div class="cmpname">
        <?php include 'fade.php' ?>
      </div>
      <div class="search">
        <div class="input-group">
          <form action="search.php" method="post">
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

<div class="container my-5">
    <?php
    // Database connection
    $conn = new mysqli("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

    // Check connection
    if ($conn->connect_error) {
        echo "<div class='alert alert-danger text-center'>Connection failed: " . $conn->connect_error . "</div>";
        exit();
    }

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the tracking number from the form input
        $tracking_number = $_POST['tracking_number'];
        
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM domesticinfo WHERE `CN No` = ?");
        $stmt->bind_param("s", $tracking_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>CN No</th>
                        <th>Booking Date</th>
                        <th>Sender Address</th>
                        <th>Packet Type</th>
                        <th>Receiver Address</th>
                        <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr style='background-color: " . ($row['CN No'] % 2 == 0 ? '#E7E7E7' : '#F7F7F7') . ";'>";
                echo "<td><a href='#?cn=" . htmlspecialchars($row['CN No']) . "'>FAST177 0" . htmlspecialchars($row['CN No']) . "</a></td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Saddress']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Pactype']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Raddress']) . "</td>";
                echo "<td><a href='index.php'><button class='btn btn-danger'>Go TO Home Page</button></a></td>";
                echo "</tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='text-center'>
                    <h3>No tracking information found for the given tracking number.</h3>
                    <a href='index.php'><button class='btn btn-danger'>Go TO Home Page</button></a>
                  </div>";
        }
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-2">
                <a href="index.php" class="text-white">@Fastbtm</a>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <a href="tel:+977023534177" class="text-white">+977 023-534177</a><br>
                <a href="tel:+9779801376348" class="text-white">9801376348 Sagar Dahal</a><br>
                <a href="tel:+9779852644177" class="text-white">9852644177 Umanath Bhandari</a><br>
                <a href="tel:+9779824915826" class="text-white">9824915826 Ashish Bhandari</a>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <h3>Social Media</h3>
                <a href="https://www.facebook.com/p/Fast-Courier-And-Cargo-Services-Birtamod-100063864826842/" class="text-white">
                    <img src="image/fbpng.jpg" alt="Facebook logo" width="20px" height="20px"> Fast Courier
                </a><br>
                <a href="https://www.facebook.com/sagar.dahal.33" class="text-white">
                    <img src="image/fbpng.jpg" alt="Facebook logo" width="20px" height="20px"> Sagar Dahal
                </a><br>
                <a href="https://www.facebook.com/uma.bhandari.148" class="text-white">
                    <img src="image/fbpng.jpg" alt="Facebook logo" width="20px" height="20px"> Umanath Bhandari
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
