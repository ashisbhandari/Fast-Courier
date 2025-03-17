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
    body{
      background-color: #f2f2f2;
    }
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
.notification {
    position: fixed;
    right: 20px;
    top: 20px;
    background-color: #007BFF;
    color: white;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: none; /* Initially hidden */
    z-index: 1000; /* Ensure it appears on top of other content */
    opacity: 0; /* Start fully transparent */
    transform: translateY(-20px); /* Start slightly above */
    transition: opacity 0.5s ease, transform 0.5s ease; /* Transition effect */
}

.notification.show {
    display: block; /* Make it visible */
    opacity: 1; /* Fade in */
    transform: translateY(0); /* Move to original position */
}
.text-left{
    padding-top:-50px;
}
#msg{
        position: fixed;
        bottom: 10px; /* Adjust as needed */
        right: 10px;  /* Adjust as needed */
        background-color: transparent;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        z-index: 1000; 
}
 /*.message {*/
 /*       position: relative;*/
 /*       width: 100%;*/
 /*       height: 200px;*/
 /*       background-color: #f2f2f2;*/
 /*       padding: 20px;*/
 /*   }*/
    

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
  
       
     <!--<p id="myButton">-->
         <div id="msg">
             <?php include 'chatbox.php' ?>
         </div>
     <!--</p>-->
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
    <div class="py-5 position-relative" id="abt">
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
<div id="notification" class="notification"></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Function to show the notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerText = message;
    document.body.appendChild(notification);
    
    // Fade in the notification
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);

    // Fade out and remove notification after 3 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 500);
    }, 3000);
}

document.getElementById('infoForm').addEventListener('submit', (event) => {
    event.preventDefault(); // Prevents form from submitting normally

    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();

    if (username && email) {
        showNotification('Your information has been submitted!');

        // Reset form fields
        document.getElementById('username').value = '';
        document.getElementById('email').value = '';
    } else {
        alert('Please fill in all fields!');
    }
});
</script>

</body>
</html>