<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fast Courier & Cargo Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
       <link rel="icon" type="image/png" href="image/fastlogo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    
    <style>
        .custom-jumbotron {
            height: 30px; /* Adjusted height for better visibility */
            text-shadow: 0px 0px 10px skyblue;
             /* Centers content vertically */
            justify-content: center; /* Centers content horizontally */
            align-items: center; /* Centers content vertically */
            background-color: rgba(255, 255, 255, 0.8); /* Optional: Add a semi-transparent background */
        }

        .aboutimg {
            box-shadow: 0px 0px 3px skyblue; /* Corrected box-shadow syntax */
            max-width: 100%; /* Makes the image responsive */
            height: auto; /* Maintains aspect ratio */
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
    
    <?php include 'menu-nav.php'; ?>

    <div class="text-center custom-jumbotron">
        <h1>Welcome!</h1>
        <h2>Fast Courier & Cargo Services</h2>
    </div>

    <section class="my-5">
        <div class="py-5 position-relative" id="abt">
        <h1 class="background-text">About Us</h1> <!-- Large background text -->
        <h3 class="text-center">About Us</h3> <!-- Smaller front text -->
    </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-12"> <!-- Adjusted column sizes -->
                    <p class="py-3">
                        Fast Courier & Cargo Services is the first and most trusted courier service in Birtamode, proudly serving the community with over 30 years of expertise in delivering fast and reliable services worldwide. Whether it's a thoughtful gift, an important document, or a special package, we ensure your deliveries reach their destinations safely and on time.
                        <br><br>
                        We believe in connecting people beyond borders, helping you share your love, emotions, and heartfelt messages with family, friends, and neighbors across the globe. At Fast Courier, every delivery is more than just a service—it's a promise to bring you closer to those who matter most.
                        <br><br>
                        Let us help bridge the distance and deliver joy right to their doorstep.
                    </p>
                </div>
                <div class="col-lg-5 col-md-4 col-12"> <!-- Adjusted column sizes -->
                    <img src="image/c5.jpg" class="img-fluid aboutimg" alt="Courier service office">
                </div>
            </div>
        </div>
        <center>
        <a href="index.php">
                <button type="button" class="btn btn-info">Go to home page</button>
            </a>
            </center>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-2">
                    <a href="index.php" class="text-white">@Fastbtm</a>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <p><a href="tel:+977023534177" class="text-white">+977 023-534177</a></p>
                    <p><a href="tel:+9779801376348" class="text-white">9801376348 - Sagar Dahal</a></p>
                    <p><a href="tel:+9779852644177" class="text-white">9852644177 - Umanath Bhandari</a></p>
                    <p><a href="tel:+9779824915826" class="text-white">9824915826 - Ashish Bhandari</a></p>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <h3>Social Media</h3>
                    <p>
                        <a href="https://www.facebook.com/p/Fast-Courier-And-Cargo-Services-Birtamod-100063864826842/" class="text-white">
                            <img src="image/fbpng.jpg" alt="Fast Courier Facebook" width="20px" height="20px"> Fast Courier
                        </a>
                    </p>
                    <p>
                        <a href="https://www.facebook.com/sagar.dahal.33" class="text-white">
                            <img src="image/fbpng.jpg" alt="Sagar Dahal Facebook" width="20px" height="20px"> Sagar Dahal
                        </a>
                    </p>
                    <p>
                        <a href="https://www.facebook.com/uma.bhandari.148" class="text-white">
                            <img src="image/fbpng.jpg" alt="Umanath Bhandari Facebook" width="20px" height="20px"> Umanath Bhandari
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
