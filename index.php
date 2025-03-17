<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fast Courier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="image/fastlogo.png">
    <link rel="stylesheet" type="text/css" href="/home/ashishbh/public_html/css/chatbox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <style>
    .track{
      padding-top: 3%;
      text-align:center;
    }
    
    .glove{
      align-items: left;
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
   
    .time{
      margin-top: -100px;
      margin-left: 60%;
      font-size:2px
    }
    .cmpname{
      margin-left: 22%;
      position: absolute;
        top: 0;
        left: 100;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }
    .position-relative {
    position: relative;
    text-align: center; /* Center-aligns the text */
}

.background-text {
    position: absolute;
    top: 50%; /* Centers vertically */
    left: 50%; /* Centers horizontally */
    transform: translate(-50%, -50%); /* Adjusts position */
    font-size: 3rem; /* Adjust the size as needed */
    color: rgba(0, 0, 0, 0.06); /* Light color for background text */
    z-index: 1; /* Places this behind the smaller text */
}

#abt h3 {
    position: relative;
    z-index: 2; /* Places this in front of the background text */
    font-size: 2rem; /* Smaller size for front text */
    color: #000; /* Color for front text */
}

        </style>
</head>
<body>


<?php include 'menu-nav.php'  ?>


<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <img src="image/cargo.jpg" alt="Dhl">
  <div class="carousel-item active">
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
      <form action="search.php"method="post">
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
   <!-- Anchor element for toggling the chatbox -->
   <!-- <a id="myButton" onclick="toggleChatbox()">-->
        <!--<img src="image/Messenger.png" alt="Messenger Logo">-->
   <!-- </a>-->

    <!-- Chatbox -->
   <!-- <div id="chatbox">-->
   <!--     <div id="messages"></div>-->
   <!--     <div id="inputContainer">-->
   <!--         <input type="text" id="userInput" placeholder="Type a message..." autocomplete="off">-->
   <!--         <button onclick="sendMessage()">Send</button>-->
   <!--     </div>-->
   <!-- </div>-->
   

    <!-- JavaScript -->
    <!--<script src="/home/ashishbh/public_html/css/chatbox.js"></script>-->
    <?php include 'chatbox.php'  ?>


<section class="my-5">
    <div class="py-5 position-relative" id="abt">
        <h1 class="background-text">About Us</h1> <!-- Large background text -->
        <h3 class="text-center">About Us</h3> <!-- Smaller front text -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="image/c5.jpg" class="img-fluid aboutimg" alt="Courier service office"><br><br>
               <div class="d-flex justify-content-end">
    <a href="about.php" class="btn btn-success mt-3">Check More</a>
</div>


            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <p class="py-3">
                    Fast Courier & Cargo Services is the first and most trusted courier service in Birtamode, with over 30 years of experience in fast and reliable deliveries worldwide. We connect you with loved ones by safely delivering gifts, important documents, and special packages on time.<br><br>Every delivery is more than just a service—it's a promise to bring you closer to those who matter most. Let us bridge the distance and deliver joy to their doorstep
                </p>
                <!-- Move button here -->
            </div>
        </div>
    </div>
</section>


<section class="my-5 ">
    <div class="py-5 position-relative" id="service">
        <h1 class="background-text">Our Services</h1> <!-- Large background text -->
        <h3 class="text-center">Our Services</h3>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mb-4">
                <div class="card">
                    <img class="card-img-top" src="image/c7.jpg" alt="Domestic Courier">
                    <div class="card-body">
                        <h4 class="card-title">Domestic Courier</h4>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12 mb-4">
                <div class="card">
                    <img class="card-img-top" src="image/c8.jpg" alt="International Courier">
                    <div class="card-body">
                        <h4 class="card-title">International Courier</h4>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12 mb-4">
                <div class="card">
                    <img class="card-img-top" src="image/c9.jpg" alt="International Cargo">
                    <div class="card-body">
                        <h4 class="card-title">International Cargo</h4>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="py-5" id="contact">
        <div class="py-5 position-relative" id="abt">
        <h1 class="background-text">Contact Us</h1> <!-- Large background text -->
        <h3 class="text-center">Contact Us</h3>
    </div>
    <div>
        <h4 class="text-center">Fast Courier and Cargo Services<br>Birtamode, Jhapa<br>Sanischare road Dhanaraj Mini market 2nd floor room no:F127<br>023-534177, 9801376348</h4>
        <h3 class="text-center">For more information:</h3>
    </div>
    <div class="w-50 m-auto">
<form action="userinfo.php" method="post">
    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="user"  class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email Id:</label>
        <input type="email" name="email" autocomplete="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Mobile:</label>
        <input type="text" name="mobile"  class="form-control" required>
    </div>
    <div class="form-group">
        <label>Comments:</label>
        <textarea class="form-control" name="comments" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>

    <div class="py-5 position-relative" id="abt">
        <h1 class="background-text">Location</h1> <!-- Large background text -->
        <h3 class="text-center">Location</h3>
    </div>

    <center>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3566.1496842512006!2d87.9893272752146!3d26.643689476808532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e5ba5fd0eb3ca5%3A0x801d5f61194f89b6!2sFast%20courier%20and%20cargo%20service!5e0!3m2!1sen!2snp!4v1716858023114!5m2!1sen!2snp" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </center>
</section>

<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-2">
                <a href="index.php" class="text-white">@Fastbtm</a>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <h4>Contact:</h4>
                <a href="tel:+977023534177" class="text-white">+977 023-534177</a><br>
                <a href="tel:+9779801376348" class="text-white">9801376348 Sagar Dahal</a><br>
                <a href="tel:+9779852644177" class="text-white">9852644177 Umanath Bhandari</a><br>
                <a href="tel:+9779824915826" class="text-white">9824915826 Ashish Bhandari</a>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <h4>Social Media</h4>
                <a href="https://www.facebook.com/p/Fast-Courier-And-Cargo-Services-Birtamod-100063864826842/" class="text-white">
                    <img src="image/fbpng.jpg" alt="Fast Courier" width="20px" height="20px"> Fast Courier
                </a><br>
                <a href="https://www.facebook.com/sagar.dahal.33" class="text-white">
                    <img src="image/fbpng.jpg" alt="Sagar Dahal" width="20px" height="20px"> Sagar Dahal
                </a><br>
                <a href="https://www.facebook.com/uma.bhandari.148" class="text-white">
                    <img src="image/fbpng.jpg" alt="Umanath Bhandari" width="20px" height="20px"> Umanath Bhandari
                </a>
            </div>
        </div>
    </div>
</footer>
<script>

document.getElementById('infoForm').addEventListener('submit', (event) => {
    event.preventDefault(); 

    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();

    if (username && email) {
        showNotification('Your information has been submitted!');

        document.getElementById('username').value = '';
        document.getElementById('email').value = '';
    } else {
        alert('Please fill in all fields!'); 
    }
});
<script>
    // Function to show notification
    function showNotification(message) {
        var notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerText = message;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.classList.add('show');
        }, 100); // Delay for fade-in effect

        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification); 
            }, 500); // Duration of fade-out effect
        }, 3000); // Duration of notification display
    }

    // Example usage:
    showNotification('Welcome to Fast Courier! We are here to serve you.');
    document.getElementById("myButton").addEventListener("mouseenter", function() {
    document.getElementById("helloMessage").style.display = "block"; // Show on hover
});

document.getElementById("myButton").addEventListener("mouseleave", function() {
    document.getElementById("helloMessage").style.display = "none"; // Hide when hover ends
});

document.getElementById("myButton").addEventListener("click", function() {
    alert("Hello!"); // Show "Hello" in an alert on click
});
</script>
</script>

</body>
</html>