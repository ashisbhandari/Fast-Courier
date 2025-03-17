<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="https://ashishbhandari431.com.np/inside/dashboard.php">Fast Courier</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        
      <?php
                                // $conn = mysqli_connect("localhost","root","","fastbtm");
                                // if (!$conn) {
                                //     die("Connection failed: " . mysqli_connect_error());
                                // }
                                // $sql = "SELECT `name` FROM signup";
                                // $result = mysqli_query($conn, $sql);
                                // if (mysqli_num_rows($result) > 0) {
                                //     while($row = mysqli_fetch_assoc($result)) {
                                //         $name=$row['name'];
                                //     }
                                // }
                                $current_hour = date('G');

                              
                                date_default_timezone_set('Asia/Kathmandu'); // Set the timezone to Nepal
                                
                                // Get current hour
                                $current_hour = date("H");
                                
                                // Define greeting messages
                                $greeting = "";
                                if ($current_hour >= 5 && $current_hour < 12) {
                                    $greeting = "Good morning";
                                } elseif ($current_hour >= 12 && $current_hour < 17) {
                                    $greeting = "Good afternoon";
                                } elseif ($current_hour >= 17 && $current_hour < 20) {
                                    $greeting = "Good evening";
                                } else {
                                    $greeting = "Good night";
                                }
                                
                                // Output the greeting message
                                echo "<span style='color:white'>$greeting!</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                ?>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li>
<?php include 'dropdown.php' ?>

      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Track <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="Track.php" method="POST">
  <input class="form-control mr-sm-2" type="search" name="tracking_number" placeholder="Tracking Number" aria-label="Search" required>
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

  </div>      
</nav>